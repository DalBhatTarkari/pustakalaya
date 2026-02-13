<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
  $uname=$_SESSION['uname'] ?? "";
  if(empty($uname) ){
    header("Location: /pustakalaya/login.php");
    exit;
  }
  if($_SESSION['role'] == "user"){
    $_SESSION['message'] = "Only for Staffs.";
    header("Location: /pustakalaya/roles/users/dash.php");
    exit;
  }
?>
<html>
  <head>
    <title>Add a New Book</title>
    <link href="/pustakalaya/log_reg_style.css" type="text/css" rel="stylesheet">
  </head>
  <script src="/pustakalaya/validate.js"></script>
  <body>
    <div class="form-container" style="height:auto;">
      <?php goback(); ?>
			<h2>Add a Book</h2>
      <p class="message" style="color:red;" id="msg"></p>
			<form method="POST">
			 <table style="margin: auto;"> 
				<tr><th>Title:</th><td><input type="text" name="title" placeholder="Enter Book Title" required></td></tr>
				<tr><th>Author<td><input type="text" name="author" placeholder="Author Name" required></td></tr>
				<tr><th>Genre:</th><td><input type="text" name="genre"  required placeholder="Fantasy,action,comedy,etc" required></td></tr>
				<tr><th>Description:</th><td><textarea name="description" placeholder="Enter Book Description" required maxlength="500"></textarea></td></tr>
      </table><br>
			 <button name="request" id="submit" disabled onmouseover="validate()">Add Book</button> 
			</form>	
    </div>
  </body>
</html>
<?php
  if(isset($_POST['request']))
  {
    $inputs = [
      'title'       => $_POST['title'],
      'author'      => $_POST['author'],
      'genre'       => $_POST['genre'],
      'description' => $_POST['description']
    ];
    $new_data = $inputs;
    $old_data = ['New Book' => true];
    if(addbook($inputs)){
      $_SESSION['message'] = "Book Added Sucessfully.";
      logaction("Added a New Book: ".$inputs['title'],$old_data,$new_data);
    }
    header("Location: /pustakalaya/roles/users/dash.php");
  }
?>

