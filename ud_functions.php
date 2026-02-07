<?php
require "db.php";
echo('<head>
<link rel="icon" href="/pustakalaya/favicon.png">
</head>');
$email_regex = '/^[^@\s]+@[^@\s]+\.[^@\s]+$/';
  function start_session($uname,$email){ // session start function
			session_start();
			global $conn;
			$sql="SELECT DISTINCT * FROM users WHERE email = '$email' AND uname ='$uname'";
			$db_records = mysqli_fetch_assoc(mysqli_query($conn,$sql));
			$pw = $db_records['pwd'];
			$id = $db_records['id'];
			$role = $db_records['role'];
			$_SESSION['id'] = $id;
			$_SESSION['uname'] = $uname;
			$_SESSION['email'] = $email;
			$_SESSION['role'] = $role;
			$_SESSION['message']= "";
	}
  function validate_user($uname,$email,$pw,$cpw,$usertype){  	//validate function
	  global $conn;
	  if($usertype === "nabin" ){$usertype = "new";}
	  if($usertype === "prachin" ){$usertype = "returning";}
	  
	  $sql1="SELECT DISTINCT * FROM users WHERE uname = '$uname'";
	  $sql2="SELECT DISTINCT * FROM users WHERE email = '$email'";
	  $sql3="SELECT DISTINCT * FROM users WHERE email = '$email' AND uname ='$uname'";
	  
	  $validity=false;
	  
	  if(strlen($pw)<8){
		  $_SESSION['message'] = "Passwords must be atleast 8 character long";
		  ?><script>window.history.back();</script><?php
		  return false;exit;
	  }//stops if pw is lessthan 8 characters long

	   switch ($usertype){ //checks if the function is validating new or old user information
			case "new":
			{
				if($pw === $cpw) {
					$x = mysqli_query($conn , $sql1);
					if(mysqli_num_rows($x) == 0 )		
						//checks if uname of new user is unique or no
					{
						$y = mysqli_query($conn,$sql2);
						if(mysqli_num_rows($y) == 0 )
						//checks if another user is using the same email or not
						{
							$validity = true;
							return true;
						}
						else
						{
							$_SESSION['message'] = "'".$email."' is already bound to another username";
							?><script>window.history.back();</script><?php
						}
					}
					else 
					{
						$_SESSION['message'] = "A user with username: '".$uname."' already exists.";
						?><script>window.history.back();</script><?php
						return false;exit;
					}		
				}
				else
				{
					$_SESSION['message'] = "The 2 Passwords donot Match";
					?><script>window.history.back();</script><?php
					return false;exit;
				}
				
				break;
			}
		 
			case "returning":
			{
				$x=mysqli_query($conn,$sql1);
				if(mysqli_num_rows($x) != 1 )		
					//checks if uname of returning user exists or not
				{
					$_SESSION['message'] = "A user with username: '".$uname."' doesnt exist.";
					?><script>window.history.back();</script><?php
					return false;exit;
				}
				else 
				{
					$db_records=mysqli_query($conn,$sql3);
					if(mysqli_num_rows($db_records) == 1 )
						//checks if uname and email match or no
					{
						$db_records = mysqli_fetch_assoc($db_records);
						$hw_pw= $db_records['pwd'];
						if(password_verify($pw,$hw_pw)) 
						{
							return true;
						}
						else
						{
							$_SESSION['message'] = "Incorrect Password";
							?><script>window.history.back();</script><?php
							return false;exit;
						}
					}
					else
					{
						$_SESSION['message'] = "Invalid Username or Email";
						?><script>window.history.back();</script><?php
						return false;exit;
					}
					
				}
				break;
			}
	   }
	}
  function add_user($uname,$email,$h_pw,$joined_date,$usertype){  // add user function

	  global $conn;
	  if($usertype === "nabin" ){$usertype = "new";}
	   switch ($usertype){ //checks what type of user is being added
			case "new":
			{
				$role = "user";
				$add_cmd="INSERT INTO users(uname,pwd,email,joined,role) VALUES('$uname','$h_pw','$email','$joined_date','$role')";
				break;
			}
		 
			case "staff":
			{
				$role = "librarian";
				$add_cmd="INSERT INTO users(uname,pwd,email,joined,role) VALUES('$uname','$h_pw','$email','$joined_date','$role')";
				break;
			}
			case "admin":
			{
				$role = "admin";
				$add_cmd="INSERT INTO users(uname,pwd,email,joined,role) VALUES('$uname','$h_pw','$email','$joined_date','$role')";
				break;
			}
			default :
			{
				return false;exit;
			}
	   }
	   
	   if(mysqli_query($conn,$add_cmd)){
		   return true;
		}
		else
		{
		   return false;exit;
		}
	}
  function cleaner($uname,$email,$h_pw,$joined_date,$usertype){ // using regex to ensure there is no symbols
	$uname_regex = '/^[\w]+$/';/*checks if compared string has only a-z,A-Z,0-9,_
							 if anything else itll return 0 or false*/
							 
	//$email_regex = '/^.+@.+\..+$/';    if stops working use this
	
	
	global $email_regex;
	if(preg_match($uname_regex,$uname))
		{
			if(preg_match($email_regex,$email))
				{
						if (strpbrk($email, ";:'\" ")) 
							{
								echo "Email contains invalid characters";
								exit;
							}						
					 	else
							{
								if(validate_user($uname,$email,$h_pw,$joined_date,$usertype)){
									return true;
								}
								else
								{
									return false;
								}
							}
				}
				else{
					echo "Invalid Email";
					return false;
					exit;
				}
			
		}
		else{
			echo "Invalid UserName";
			return false;
			exit;
		}
	}
  function validateuip($inputs){
	foreach($inputs as $input){
		if (strpbrk($input, ";'\"()[]{}%^!#$%^")) 
		{
			echo "<p id = 'message'>Any User Input may not contain any special characters or brackets</p>";
			exit;
		}
 	 }
	  return true;
	}
  function defineuser(){
	if(empty($_SESSION['id'])){
		session_start();
	}
	global $conn;
	if(!isset($_SESSION['id'])){
		header('Location:/pustakalaya/login.php');
		exit;
		}else{
			$id=intval($_SESSION['id']);
  			$sql="SELECT DISTINCT * FROM users WHERE id=$id ";
 			$user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			 return $user;
		}
 	 }

  function addbook($inputs){
	global $conn;
	if(!validateuip($inputs))
		{
			exit;
		}
	$title = strtoupper($inputs['title']);
	$author = strtoupper($inputs['author']);
	$genre = strtoupper($inputs['genre']);
	$description = strtoupper($inputs['description']);
	
	
	$sql1="SELECT * FROM books WHERE title LIKE '%$title%' AND author LIKE '%$author%'";
	$returned_books1=mysqli_query($conn,$sql1);

	if(mysqli_num_rows($returned_books1) != 0){
		$_SESSION['message']="'".$title."' by '".$author."' is Already Available.";
		return false;
		exit;
	}

	$sql2="SELECT * FROM req WHERE title LIKE '%$title%' AND author LIKE '%$author%'";
	$returned_books2=mysqli_query($conn,$sql2);

	if(mysqli_num_rows($returned_books2) != 0){
		$_SESSION['message']="'".$title."' by '".$author."' is Already under review.";
		return false;
		exit;
	}

	if($_SESSION['role']/*=="user"*/)
	{
		$add_cmd="INSERT INTO req(title,author,genre,description) VALUES('$title','$author','$genre','$description')";
		if(mysqli_query($conn,$add_cmd)){
			$_SESSION['message']="'".$title."' by '".$author."' has been submitted to be reviewed.";
			return true;
		}else{
			$_SESSION['message']="Book not submitted to be reviewed.";
			return false;
		}
	}/*elseif($_SESSION['role']=="librarian" || $_SESSION['role']=="admin"){
		$add_cmd="INSERT INTO books(title,author,genre,description) VALUES('$title','$author','$genre','$description')";
		if(mysqli_query($conn,$add_cmd)){
			$_SESSION['message']="'".$title."' by '".$author."' has been added to the Database.";
			return true;
		}else{
			$_SESSION['message']="Book could not be added to the Database.";
			return false;
		}
	}*/
 	}
  function getbook($id,$db){
	global $conn;
	$inputs=[ 'id' => $id,
			  'from' => $db];
	if(validateuip($inputs)){
		$sql = "SELECT * FROM " . $inputs['from'] . " WHERE id = $id";
		$book = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		return $book;
	}
   }
  function changebookstatus($id,$inputs,$cover,$path,$initialstatus,$action) { 

	 global $conn;
	 if($action != ""){
		$sql = "DELETE FROM books WHERE id = $id";
		mysqli_query($conn,$sql);
		return true;
	 }
	
	if(validateuip($inputs)){
		if($inputs['finalstatus'] == "approved"){
			$db = "books";
		}else{ 
			$db = "req";
		}

		$title = strtoupper($inputs['title']);
		$author = strtoupper($inputs['author']);
		$genre = strtoupper($inputs['genre']);
		$description = strtoupper($inputs['description']);
		$status=$inputs['finalstatus'];

		$cover = empty($cover) ? "NULL" : "'" .$cover . "'";
		$path  = empty($path)  ? "NULL" : "'" . $path . "'";

		if($db === "books" && $initialstatus !== "approved") {
			$sql = "INSERT INTO books(title,cover,author,genre,description,file_path) VALUES('$title',$cover,'$author','$genre','$description',$path)"; 
		}elseif($db === "books" && $initialstatus === "approved") 
		{$sql = "UPDATE books SET title='$title', cover=$cover, author='$author', genre='$genre', description='$description', file_path=$path
		WHERE id=$id";}
		else{
			$sql = "UPDATE req 
			SET title='$title', cover=$cover, author='$author', genre='$genre', description='$description', file_path=$path, status='$status' 
			WHERE id=$id";
		}

		if($db === "books" && $initialstatus !== "approved"){ 
			$sql2 = "DELETE FROM req WHERE id = $id";
			mysqli_query($conn,$sql2);
		}
		

		if(mysqli_query($conn,$sql)){
			return true;
		}else{
			echo "SQL Error: " . mysqli_error($conn);
			exit;
			return false;
		}
	}else {
		?><script>window.history.back();</script><?php
	}
   }
  function logaction($action,$old_data,$new_data){
	if(validateuip($old_data) && validateuip($new_data))
	{
		global $conn;
		$id = $_SESSION['id'];
		$user = defineuser();
		$uname = $user['uname'];
		$old_data = print_r($old_data,true);
		$new_data = print_r($new_data,true);

		$date = date("Y-m-d");
		$time = date("H:i:s");
		
		$role=$user['role'];
		$id_uname = $id ."_". $uname;
		$log_sql = "INSERT INTO logs(action,performed_by,role,old_data,new_data,performed_date,performed_time) VALUES('$action','$id_uname','$role','$old_data','$new_data','$date','$time')";

		mysqli_query($conn,$log_sql);
	}
   }
  function updateuser($h_pw,$usertype){
	global $conn;
	$user = defineuser();
	$id = $user['id'];
	$role = (!empty($usertype)) ? $usertype : $user['role'];
	$sql = "UPDATE users SET pwd = '$h_pw' , role = '$role' where id =$id";
	if(mysqli_query($conn,$sql)){
		return true;
	}
	else{
		return false;
	}
   }
  function validatemail($id,$email){
	global $email_regex,$conn;
	if(preg_match($email_regex,$email)){
		$sql="SELECT * FROM users WHERE email ='$email'";
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_assoc($result)?? [];
		if(mysqli_num_rows($result) === 0 || $user['id'] == $id){
			return true;
		}else{
			echo "<p id = 'message'>Duplicate Email For UserID: '".$id."'</p>";
			exit;
		}
	}else{
		echo "<p id = 'message'>Invalid Email For UserID: '".$id."'</p>";
		exit;
	}
   }

  function bookmarksearch($searchquery,$uid){

   global $conn;
   $searchquery = ['query' => $searchquery];

   if(validateuip($searchquery)){
	   $searchquery= $searchquery['query'];
	   $sql = "
	   SELECT b.bookmark_id,u.id AS user_id,bk.id AS book_id,bk.title AS book_title,bk.author AS book_author,bk.cover AS cover,bk.genre AS genre,bk.description AS description,bk.file_path AS file_path,b.marked_on,b.status
		   FROM bookmarks b
		   JOIN users u ON b.u_id = u.id
		   JOIN books bk ON b.book_id = bk.id
		   WHERE u.id = $uid
		   AND (bk.title LIKE '%$searchquery%' OR 
			   bk.author LIKE '%$searchquery%' OR 
			   bk.genre LIKE '%$searchquery%' OR 
			   bk.description LIKE '%$searchquery%' OR
			   b.status LIKE '%$searchquery%')
		   
		   ORDER BY b.marked_on DESC ";
	   $result = mysqli_query($conn, $sql);
	   $numrow = mysqli_num_rows($result);
	   
	   if($numrow === 0 ){
			$message = "No results for ' ". $searchquery ." '.";
            echo"<p id='message' style='top:unset;padding:unset;'> ".$message."</p> ";
            $message = "";
	   }else
	   {
	   	  while ($book = mysqli_fetch_assoc($result)) {
		   echo '<div class="marked-books"><a style="all:unset; cursor:pointer;" href="/pustakalaya/roles/book.php?id=' . $book['book_id'] . '&from=books">
				   <img src="'. $book['cover'] .'"></a>
				   <div class="book-detail">
					<form><a style="all:unset; cursor:pointer;" href="/pustakalaya/roles/book.php?id=' . $book['book_id'] . '&from=books">
					   <h3>'. $book['book_title'] .'</h3>
					   <h4>By: '. $book['book_author'] .'</h4>
					   <h4>Added on: '. $book['marked_on'] .'</h4></a>
					   Status:
					   <select name="reading-status">
						   <option value="reading" '. ($book['status'] == 'reading' ? 'selected' : '') .'>Reading</option>
						   <option value="planned" '. ($book['status'] == 'planned' ? 'selected' : '') .'>Planned</option>
						   <option value="completed" '. ($book['status'] == 'completed' ? 'selected' : '') .'>Completed</option>
						   <option value="dropped" '. ($book['status'] == 'dropped' ? 'selected' : '') .'>Dropped</option>
					   </select>&nbsp;&nbsp;&nbsp;
					   <button style="z-index:99;" type="submit" name="submit" value="'.$book['book_id'].'">Save</button>
					</form>
				   </div>
			   </div>';

	   		}
   		}
   	}
   }
?>
