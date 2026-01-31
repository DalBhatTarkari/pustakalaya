<?php
    session_start();
    require "../ud_functions.php";
    require "../goback.php";
    $user=defineuser();
    $uname  = $user['uname'];
    $email  = $user['email'];
    $joined = $user['joined'];
    $role   = $user['role'];
?>

<html>
 <head><title>User Profile</title>
 <style>
    body{
    background-color: rgb(27, 27, 27);
    display:grid;
    justify-content: center;
    align-items: flex-start;
    text-align: center;
    
    }
    div{
    position: relative;
    background-color: rgb(68, 68, 68);
    top:10%;
    color:white;
    height:auto%;
    width: 95%;
    padding:20px;
    border-radius: 25px;
    
    }
    table{
    color:rgb(167, 167, 167);
    padding: 0 0 0 10px;
    border-spacing: 10 20px;
    }
    p{
        background-color:white;
        padding:5px 10px 5px 10px;
        border-radius:10px;
    }
    .buttons{
        all:unset;
        display:flex;
        justify-content:space-evenly;
    }
    .item{
        
        text-decoration:none;
        color:white;
        background-color: rgba(118, 118, 118, 1);
        padding: 5 10 5 10px;
        border-bottom: 1px solid rgb(142, 122, 122);
        border-radius:10px;
    }
    .item:hover{
        opacity:50%;
    }
 </style>
 </head>
 <body>    
		<div >
            <h1> Profile</h1>
        <?php goback();?> 
		<table>
		 <tr><th>UserName:</th><td><p class= "answer"><?php echo strtoupper(htmlspecialchars($uname));?></p></td></tr>
		 <tr><th>Email:</th><td><p class= "answer"><?php echo htmlspecialchars($email);?></p></td></tr>
		 <tr><th>Joined Date:</th><td><p class= "answer"><?php echo htmlspecialchars($joined);?></p></td></tr>
		 <?php if($role != "user") {
            echo '<tr><th>Role:</th><td><p class= "answer">' . strtoupper(htmlspecialchars($role)) . '</p></td></tr>';}?>
		</table>
        <br>
        <div  class="buttons">
            <a class="item" href="/pustakalaya/changepassword.php">Change Password</a>
            <a class="item" href="/pustakalaya/logout.php">Logout</a>
        </div>
		</div>
 </body>
</html>