<?php
    session_start();
    header("Cache-Control: no-cache, must-revalidate, max-age=0");
    require "search.php";
?>
<html>
    <head>
        <title>Books Under Review</title>
        <link rel="stylesheet" type="text/css" href="/pustakalaya/dashstyle.css">
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
                <img src="/pustakalaya/images/home.png" class="icon" id="home" onclick="window.location.href='dash.php'">
                <?php
                    if (!empty($_SESSION['uname'])) {
                        echo '<img src="/pustakalaya/images/accicon.png" class="icon" id="home" onclick="window.location.href=\'bookmarks.php\'">';
                    } else {
                        echo '<input type="button" value="Login" class="icon" id="loginbut" onclick="window.location.href=\'../login.php\'">';
                    }
                ?>


                
            </div>
        </div>
        <p id="message">Books Under Review</p>
        <?php 
        if(!empty($_SESSION['message']))
            {echo '<p id="message">'.$_SESSION['message'].'</p>';
            $_SESSION['message']="";
            }?>
    </body>
    
    <script>
       
     function gotopage(pgnum) {
        let url = window.location.href;
        let remove = url.includes("?") ? "&pgnum=" : "?pgnum=";
         if (url.includes("?pgnum=")) {
            url = url.split("pgnum=")[0];
         } else if (url.includes("&pgnum=")) {
            url = url.split("&pgnum=")[0];
         }
        window.location.href = url + remove + pgnum;
     }
    </script>
</html>
<?php
$booksperpage = 12;


$pagenum = $_GET['pgnum'] ?? 1;

if(isset($_GET['submit'])){
    $rownum= (int)search(trim($_GET['searchquery']),$pagenum,"underreview");
}else{
    $rownum= (int)search("",$pagenum,"underreview");
}

$pagecount = $rownum/$booksperpage;
if( $pagecount> (int)$pagecount){
    $pagecount = (int)$pagecount+1;
}
echo '<div class="footer"';
if($pagenum>1){
    echo'<a  style="position:absolute;left:3%;" href="#" onclick="gotopage('.($pagenum - 1).')" ><div class="pgnum" ><--Previous </div></a>';
}


for($i = 1; $i <= $pagecount; $i++) {
    $class = ($i == $pagenum) ? "currentpg" : "";
    echo '<a href="#" onclick="gotopage('.$i.')">
            <div class="pgnum '.$class.'" id="'.$i.($class=="currentpg" ? " disabled " : "").'">'.$i.'</div>
          </a>';
}
if($pagenum < $pagecount){
    echo'<a style="position:absolute;right:10%;" href="#" onclick="gotopage('.($pagenum + 1).')" ><div class="pgnum" name="pagenumber">Next --> </div></a>';
}
echo '</div class="footer">';
?>