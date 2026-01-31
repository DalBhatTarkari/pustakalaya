<?php
 $uname="root";
 $host="localhost";
 $pw="";
 $db="library_database";
 $conn = mysqli_connect($host,$uname,$pw,$db);
 if(!$conn)
 {
	 echo ("connection Faliled:". mysql_connect_error());
 }
	 
?>
