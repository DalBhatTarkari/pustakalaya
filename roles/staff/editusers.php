<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";

    if($_SESSION['role'] === "user" || $_SESSION['role'] === "librarian" || $_SESSION['role'] !== "admin"){
        $_SESSION['message'] = "You Lack the Permissions.";
        header("Location: /pustakalaya/roles/users/dash.php");
        exit;
    }

    function search($searchquery){
    global $conn;

    $searchquery=['query' => $searchquery];

    if(validateuip($searchquery)){
        $searchquery= $searchquery['query'];
        $sql = "SELECT *  FROM users
        WHERE id LIKE '%$searchquery%'
           OR uname LIKE '%$searchquery%'
           OR email LIKE '%$searchquery%'
           OR joined LIKE '%$searchquery%'
           OR role LIKE '%$searchquery%'
           ORDER BY joined desc";
        $result = mysqli_query($conn,$sql);
        $numrow=mysqli_num_rows($result);
        if($numrow == 0){
            $message = (!empty($searchquery))?  "No Users found containing ' ". $searchquery ." '." : "No logs!";
            echo"<p id='message'> ".$message."</p> ";
            $message = "";
        } else{

            if($searchquery!= ""){$message = "Searching for ' ". $searchquery ." '.";}
            else { $message = "";}
            echo "<p id='message'> ".$message."</p> ";
            
            
            while($udata = mysqli_fetch_assoc($result)){

                $urole = $udata['role'] ?? "user";
                echo '<form name = "'.$udata['id'].'" method="POST"><tr>';
                echo '<td>'.$udata['id'].'</td>';
                echo '<td>'.$udata['uname'].'</td>';
                echo '<td><input type="text" required name="email" style="height:50px;width:400px" value="'.$udata['email'].'"'.(($urole === 'admin') ? ' readonly' : '').'></td>';
                echo '<td>'.$udata['joined'].'</td>';
                echo '
                    <td>
                        <select name="role"' . ($urole === 'admin'? ' disabled><option>Admin</option>' : '') . '>
                            <option value="user"' . ($urole === 'user' ? ' selected' : '') . '>User</option>
                            <option value="librarian"' . ($urole === 'librarian' ? ' selected' : '') . '>Librarian</option>
                        </select>
                        </td><td><button type="submit" name="submit" value="'.$udata['id'].'"'. (($urole === 'admin') ? " disabled" : "") .'>Save</button></td>
                </tr></form>';
            }

                
            }
    }

}
?>
<html>
 <head><title>Users</title>
 <link href = "logs.css" rel= "stylesheet" type="text/css">
 <script src = "../header.js"></script>
 </head>
 <body>    
		
        <div style="all:unset;">    
            <?php goback();?>
            <div class="searchfunction"> 
                <img src="/pustakalaya/images/searchglass.png"  id="search" onclick="showbar()">
                <form method="POST" >
                    <input type="text" name="searchquery" id="searchbar"  placeholder="Enter a Search Query" >
                    <input type="Submit" name="submit"  id="but" value="Search" >
                </form>
            </div>
            
            <div style="all:unset;display:grid;justify-content: center;  align-items: center; ">
                <table style="table-layout: fixed;margin: 0 auto; width:90%; ">
		            <tr><th style="width:60px">User ID:</th><th>UserName:</th><th>Email:</th><th>Joined Date:</th><th>Role:</th><th>Save</th></tr>
                    <?php if(isset($_POST['submit']) && $_POST['submit'] == "Search")
                        {
                            $searchquery = $_POST['searchquery'] ?? "";
                            search($searchquery);}
                        else{
                            search("");
                        }?> 
		        </table> 
                <p id="message"></p>
            </div>

        </div>
		
 </body>
</html>
<?php
  if(isset($_POST['submit']) && $_POST['submit'] != "Search")
  {
    global $conn;
    $uid = $_POST['submit'];
    $urole = $_POST['role']?? "user";
    $umail = $_POST['email'];
    $inputs = ['email' => $umail];

    if(validateuip($inputs))
    {

        validatemail($uid,$umail);

        $sql = "UPDATE users SET role = '$urole', email = '$umail' WHERE id=$uid";
        if(mysqli_query($conn,$sql)){
            $_SESSION['message'] = "Updated the user with UserID:".$uid;
            echo '<meta http-equiv="refresh" content="0;url=/pustakalaya/roles/users/dash.php">';
            logaction("Changed Details of UserID :".$uid ,['Details Changed' => true], ['id' => $uid,'email' => $umail,'role' => $urole]);
        }else{
            $_SESSION['message'] = "Failed to updated the user with UserID:".$uid;
            echo '<meta http-equiv="refresh" content="0;url=/pustakalaya/roles/users/dash.php">';
        }
    }
  }
?>