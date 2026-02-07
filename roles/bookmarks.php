<?php
  session_start();
  header("Cache-Control: no-cache, must-revalidate, max-age=0");
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
  $user = defineuser();
   $uid = $user['id'] ?? 1;
  $searchquery = "";
?>
<html>
    <head>
        <title>Bookmarks</title>
        <link rel="stylesheet" type="text/css" href= "/pustakalaya/dashstyle.css">
    </head>
    <script src="header.js"></script>
    <body>
        <div class="header">
            <?php require "menu.php"; 
              menu();
            ?>
            <div class="icons">
                <form method="GET" class="searchfunction">
                    <input type="text" name="searchquery" class="searchfunction" id="searchbar" placeholder="Enter a Search Query">
                    <input type="Submit" name="submit" class="searchfunction" value="Search" id="but">
                </form>
                <img src="/pustakalaya/images/searchglass.png" class="icon" id="search" onclick="showbar()">
                <img src="/pustakalaya/images/home.png" class="icon" id="home" onclick="window.location.href='/pustakalaya/roles/users/dash.php'">
            </div>
        </div>
        
        <p id="message" style="font-size: 30px;">Bookmarks</p>

        <?php 
        if(!empty($_SESSION['message']))
            {echo '<p id="message">'.$_SESSION['message'].'</p>';
                $_SESSION['message']="";
            }?>
            
            <div id="bookmark-container">
                <?php 
                    $searchquery = $_GET['searchquery'] ?? "";
                    bookmarksearch($searchquery,$uid); 
                ?>
            </div>
    </body>
</html>
<?php
  if(isset($_GET['submit']) && $_GET['submit'] !="Search" ){
    $bid = $_GET['submit'];
    $status = $_GET['reading-status'];
    if($status === "planned" || $status === "reading" || $status === "dropped" || $status === "completed"){
        $edit_sql = "UPDATE bookmarks SET status = '$status' WHERE book_id = $bid";
        if(mysqli_query($conn,$edit_sql)){
            $_SESSION['message'] = "Sucessfully Updated Book Status.";
            ?><script> window.location.href = "/pustakalaya/roles/bookmarks.php";</script><?php
        }else{
            $_SESSION['message'] = "Failed Updated Book Status.";
            ?><script> window.location.href = "/pustakalaya/roles/bookmarks.php";</script><?php
        }
    }
  }else{
    
  }
?>