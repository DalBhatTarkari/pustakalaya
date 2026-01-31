<?php 
  session_start();
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/db.php";
  $uname=$_SESSION['uname'] ?? "";
  if(empty($uname) ){
    header("Location: /pustakalaya/login.php");
    exit;
  }
?>
<html>
 <head>
  <title>Change Password</title>
  <link rel="stylesheet" type="text/css" href="log_reg_style.css">
 </head>
 <style>
  a{
    color:inherit;
  }
 </style>
 <body>
  <div style="height:450px;">
    <?php require "goback.php"; goback()?> <!--adds the backbutton defined in the goback.php file -->
    <h1>Change Password </h1>
    <p class="message" style="color:red;"><?php echo $_SESSION['message'];$_SESSION['message'] = "";?></p>
    <form method="POST">
      <table>
        <tr><th>Username: </th><td><input type="text" name="uname"  id="uname" required></td></tr>
        <tr><th>Email: </th><td><input type="email" name="email"  id="email" required></td></tr>
        <tr><th>Password: </th><td><input type="password" name="pw" id="pw" required></td></tr>
        <tr><th>New Password: </th><td><input type="password" name="npw" id="npw" required></td></tr>
      </table>
      <button name="submit" id="submit">Change Password</button>
    </form>
    <a href='/pustakalaya/forgotpassword.php'>Forgot Password?</a>
  </div>
 </body>
</html>
<?php
if(isset($_POST['submit'])){
  $uname = trim($_POST['uname'] ?? "");
  $email = trim($_POST['email'] ?? "");
  $inputs = ['uname' => $uname,'email' => $email];
  $pwd = $_POST['pw'] ?? '';
  $n_pw = $_POST['npw'] ?? '';
  $h_pw = password_hash($n_pw,PASSWORD_DEFAULT);
  if(validateuip($inputs)){
    if(validate_user($uname,$email,$pwd,$pwd,"prachin")){
      if(updateuser($h_pw,"")){
        logaction($uname." updated their passwords",[],['changed_pwd' => true]);
        $_SESSION['message'] = 'Password Changed Sucessfully';
        header('Location:/pustakalaya/roles/users/dash.php');
      }
    }
  }
}
?>