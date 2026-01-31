<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
  $uname=$_SESSION['uname'] ?? "";
  if(empty($uname)){
    header("Location: /pustakalaya/login.php");
    exit;
  }
?>
<html>
  <head>
    <title>Request a new book</title>
    <link href="/pustakalaya/log_reg_style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="form-container">
      <?php goback(); ?>
			<h2>Request to Add a Book</h2>
			<form method="POST">
			 <table style="margin: auto;"> 
				<tr><th>Title:</th><td><input type="text" name="title" placeholder="Enter Book Title" required></td></tr>
				<tr><th>Author<td><input type="text" name="author" placeholder="Author Name" required></td></tr>
				<tr><th>Genre:</th><td><input type="text" name="genre"  required placeholder="Fantasy,action,comedy,etc" required></td></tr>
				<tr><th>Description:</th><td><textarea name="description" placeholder="Enter Book Description" required maxlength="500"></textarea></td></tr>
			 </table><br>
			 <button name="request">Send Request</button> 
			</form>	
    </div>
  </body>
</html>
<?php

  if(isset($_POST['request']))
  {
    $inputs = [
      'title'       => strtolower(trim($_POST['title'] ?? "")),
      'author'      => strtolower(trim($_POST['author'] ?? "")),
      'genre'       => strtolower(trim($_POST['genre'] ?? "")),
      'description' => strtolower(trim($_POST['description'] ?? "")),
    ];
  
    addbook($inputs);
    header("Location: /pustakalaya/roles/users/dash.php");
  }
?>

