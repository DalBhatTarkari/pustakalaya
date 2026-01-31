<?php
session_start();
if (isset($_SESSION['otp_expire']) && $_SESSION['otp_expire'] < time()) {
    $_SESSION['otp'] = "";
    $_SESSION['otp_expire'] = "";
}

require __DIR__ . '/ud_functions.php';
require __DIR__ . '/mailerfunction.php';
global $conn;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


?>
<html>
    <head>
        <title>Forgot Password</title>
        <link href="log_reg_style.css" type="text/css" rel ="stylesheet">
    </head>
    <script>
        const params = new URLSearchParams(window.location.search);
        let email = "";

        if (!params.has('email')) {
            while (!email) {
                email = prompt("Enter Your Email (required)");
                if (email === null) {
                    alert("Email is required to continue.");
                }
            }
            window.location.href = window.location.pathname + "?email=" + encodeURIComponent(email);
        }
    </script>
    <body>
        <form method="POST">
            <p id = "otp"> Enter Your OTP : <br><input type = "number" name ="otp" id= "otp" maxlength = 6 required></p>
            <button name="submit" value="sent">Confirm OTP</button>
        </form>
        <p id = "message" style="color:red;"><?php echo $_SESSION['message']; $_SESSION['message'] = "";?>  </p>
    </body>
</html>
<?php
    $email = $_GET['email'] ?? '';

    if ($email && empty($_SESSION['otp'])) {
        ?><p id = "message" ><?php echo $_SESSION['otp'];?>  </p><?php
        sendOTP($email);
    }

    if (isset($_POST['submit'])) {
    $uipotp = $_POST['otp'];
    if (isset($_SESSION['otp'], $_SESSION['otp_expire']) &&
        $_SESSION['otp'] === intval($uipotp) &&
        time() < $_SESSION['otp_expire']) {

        // Generate 16-character password
        $pwd = bin2hex(random_bytes(8));
        $h_pw = password_hash($pwd,PASSWORD_DEFAULT);
        if (mysqli_query($conn,"UPDATE users SET pwd = '$h_pw' WHERE email = '$email'")) {
            logaction("Password Reset For User with Email: ".$email,['password_reset' => 1],['password_reset' => 1]);
            $_SESSION['message'] = 'Your new password is ' . $pwd;
            $_SESSION['otp'] = "";
            $_SESSION['otp_expire'] = "";
            echo '<script>
                    window.location.href = "/pustakalaya/login.php";
                    </script>';
        } else {
            $_SESSION['message'] = 'Failed to update password.';
        }
    } else {
        $_SESSION['message'] = 'Invalid or expired OTP.';
    }
}
?>
