<?php 
function menu() {
    echo '
    <script src="../header.js"></script>
    <style>
    #ham{
        position:fixed;
        color:black;
        background-color:black;
        margin-top:30px;
        height:20px;
        top:4px;
        left:30px;
        cursor:pointer;
        font-size:20px;
        text-align:center;
    }
    #ham:hover{
        opacity:50%;
    }
    #menu{
        background-color: rgb(68, 68, 68);
        position:absolute;
        font-size:20px;
        padding:10px 10px 10px 30px;
        left:0px;
        top:60px;
        width:170px;
        border-bottom-right-radius:10px;
        border-top-right-radius:10px;
        z-index:10;
        gap:20px;
        display:none;
    }
        
    #menu .item{
        border-bottom: 1px solid rgb(142, 122, 122);
        display:block;
    }
    #menu .item:hover{
        transform: scale(1.1);
        opacity:50%;
        transition: transform 0.1s;
    }
    </style>
    <div><img  id="ham" src="/pustakalaya/images/menu.png"  id="search" onclick="showmenu()">
        <div id="menu">
        <a class="item" href="/pustakalaya/roles/users/dash.php">Home</a><br>
        <a class="item" href="/pustakalaya/roles/booksunderreview.php">Books under review</a><br>';
        
    if (isset($_SESSION['uname']) && $_SESSION['uname'] != NULL) {
        
        echo '<a class="item" href="/pustakalaya/roles/profile.php">Profile</a><br>';
        if($_SESSION['role'] === "admin"){
            echo '<a class="item" href="/pustakalaya/roles/staff/logs.php">View Logs</a><br>
            <a class="item" href="/pustakalaya/roles/staff/editusers.php">View Users</a><br>';
        }
        if($_SESSION['role'] !== "user"){
            echo '<a class="item" href="/pustakalaya/roles/staff/addbook.php">Add a Book</a><br>';
        }
        echo '<a class="item" href="/pustakalaya/roles/users/requestbooks.php">Request a Book</a><br>
            <a class="item" href="/pustakalaya/changepassword.php">Change Password</a><br>
            <a class="item" href="/pustakalaya/logout.php">Logout</a><br>
            ';
    } else {
        echo '<a class="item" href="/pustakalaya/login.php">Login</a><br>';
    }
    
    echo '
        </div>
    </div>';
}
?>

