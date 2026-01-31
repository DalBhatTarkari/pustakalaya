<?php
  session_start();
  if(empty($_SESSION['message'])){
    $_SESSION['message'] = "";
  }
?>
<html>
 <head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="log_reg_style.css">
 </head>
 <body>
  <div style="height:450px;">
  <?php require "goback.php"; goback()?> <!--adds the backbutton defined in the goback.php file -->
  <h1>Login </h1> 
  <p class="message" style="color:red;"><?php echo $_SESSION['message'];$_SESSION['message'] = "";?></p>
  <form method="POST">
   <table>
    <tr><th>Username: </th><td><input type="text" name="uname"  id="uname" required></td></tr>
    <tr><th>Email: </th><td><input type="email" name="email" id="email"required></td></tr>
    <tr><th>Password: </th><td><input type="password" name="pw" id="pw" required></td></tr>
   </table>

   <button name="submit" id="submit">Login</button>
  </form>
  <button onclick="window.location.href='/pustakalaya/register.php'">Register as <br>New User</button>
  <br><a href='/pustakalaya/forgotpassword.php'>Forgot Password?</a>
</div>
 </body>
</html>
<?php
$usertype="prachin";
require "db.php";
require "ud_functions.php";
global $conn;
 if(isset($_POST['submit']))
 {
  $uname = trim($_POST['uname'] ?? "");
  $email = trim($_POST['email'] ?? "");
	$pw    = trim($_POST['pw'] ?? "");
	
	if(cleaner($uname,$email,$pw,"",$usertype)){
      $_SESSION=[];
      session_destroy();
			start_session($uname,$email);
			echo "Welcome Back ".strtoupper($uname).".<br><p id='mesg'></p>";
			
?>
<script>
  window.location.href = "roles/users/dash.php";
</script>
<?php
		
	}
  }
?>