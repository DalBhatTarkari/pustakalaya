<?php 
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendOTP($email) {
    $otp = random_int(100000, 999999);

    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expire'] = time() + 300;

    $mail = new PHPMailer(true);    
    $app_password = "";
        if($app_password === ""){
            echo "<p id='message'>App Password is UNSET. Enter and Retry.</p>";
            exit;
        }
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'uless668@gmail.com';
        
        $mail->Password = $app_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('uless@gmail.com', 'Password Reset');
        $mail->addAddress($email);

        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP is: $otp\n\nValid for 5 minutes.";

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}
?>