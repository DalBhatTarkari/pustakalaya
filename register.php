<?php
  session_start();
  require "ud_functions.php";
  if(empty($_SESSION['message'])){
    $_SESSION['message'] = "";
  }
?>
<html>
 <head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="log_reg_style.css">
 </head>
 <script src="/pustakalaya/validate.js"></script>
 <body> 
 <div style= "height:500px;">
  <form method="POST">

  <?php require "goback.php"; goback()?> <!--adds the backbutton defined in the goback.php file -->
  <h1>Register </h1>
  <p class="message" style="color:red;" id="msg"><?php echo $_SESSION['message'];$_SESSION['message'] = "";?></p>
   <table>
    <tr><th>Username: </th><td><input type="text" name="uname"  id="uname" required></td></tr>
    <tr><th>Email: </th><td><input type="email" name="email" id="email"required></td></tr>
    <tr><th>Password: </th><td><input type="password" name="pw" id="pw" required></td></tr>
	<tr><th>Confirm Password: </th><td><input type="password" name="cpw" id="cpw" required></td></tr>
   </table>
   <button name="submit" id="submit" disabled onmouseover="validate()">Register</button>
  </form>
  <button onclick="window.location.href='/pustakalaya/login.php'">Login as <br>Returning User</button>
  <br><a href='/pustakalaya/forgotpassword.php'>Forgot Password</a>
  </div>
 </body>
</html>
<?php

$usertype="nabin"; // new or returning

require "db.php";

global $conn;
 if(isset($_POST['submit']))
 {
  $uname = strtolower(trim($_POST['uname'] ?? ""));
  $email = strtolower(trim($_POST['email'] ?? ""));
  $pw    = trim($_POST['pw'] ?? "");
  $c_pw  = trim($_POST['cpw'] ?? "");
	$joined_date=date("Y-m-d");
	
	
	if(cleaner($uname,$email,$pw,$c_pw,$usertype)){
		$h_pw=password_hash($pw,PASSWORD_DEFAULT);
		if(add_user($uname,$email,$h_pw,$joined_date,$usertype)){
      $_SESSION=[];
      session_destroy();
			start_session($uname,$email);
			echo "User added Sucessfully<br>";
			echo "Welcome, ".strtoupper($uname).".<br><p id='mesg'></p>";
			
?>
<script>
  window.location.href = "roles/users/dash.php";
</script>
<?php
		
	}
	}
 }
?>
