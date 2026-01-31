<?php
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";

    
    $user=defineuser();
    $uname  = $user['uname'];
    $email  = $user['email'];
    $joined = $user['joined'];
    $role   = $user['role'];

    if($_SESSION['role'] == "user"){
        $_SESSION['message'] = "Only for Staffs.";
        header("Location: /pustakalaya/roles/users/dash.php");
        exit;
    }

    function search($searchquery){
    global $conn;

    $searchquery=['query' => $searchquery];

    if(validateuip($searchquery)){
        $searchquery= $searchquery['query'];
        $sql = "SELECT *  FROM logs
        WHERE logid LIKE '%$searchquery%'
           OR action LIKE '%$searchquery%'
           OR performed_by LIKE '%$searchquery%'
           OR role LIKE '%$searchquery%'
           OR old_data LIKE '%$searchquery%'
           OR new_data LIKE '%$searchquery%'
           OR performed_date LIKE '%$searchquery%'
           OR performed_time LIKE '%$searchquery%'
           ORDER BY logid desc";
        $result = mysqli_query($conn,$sql);
        $numrow=mysqli_num_rows($result);
        if($numrow == 0){
            $message = (!empty($searchquery))?  "No Logs found containing ' ". $searchquery ." '." : "No logs!";
            echo"<p id='message'> ".$message."</p> ";
            $message = "";
        } else{

            if($searchquery!= ""){$message = "Searching for ' ". $searchquery ." '.";}
            else { $message = "";}
            echo "<p id='message'> ".$message."</p> ";
            
            
            while($log = mysqli_fetch_assoc($result)){
                echo '<tr>';

                echo '<td>'.$log['logid'].'</td>';
                echo '<td>'.$log['action'].'</td>';
                echo '<td>'.$log['performed_by'].'</td>';
                echo '<td>'.$log['role'].'</td>';
                echo '<td style=" width: 25%;max-width:300px;"><textarea readonly>'.$log['old_data'].'</textarea></td>';
                echo '<td style=" max-width:300px"><textarea readonly>'.$log['new_data'].'</textarea></td>';
                echo '<td>'.$log['performed_date'].'</td>';
                echo '<td>'.$log['performed_time'].'</td>';
                
                echo '</tr>';
            }

                
            }
    }

}
?>
<html>
 <head><title>Logs</title>
 <link href = "logs.css" rel= "stylesheet" type="text/css">
 <script src = "../header.js"></script>
 </head>
 <body>    
		
        <div style="all:unset;">    
            <?php goback();?>
            <div class="searchfunction"> 
                <img src="/pustakalaya/images/searchglass.png"  id="search" onclick="showbar()">
                <form method="GET" >
                    <input type="text" name="searchquery" id="searchbar"  placeholder="Enter a Search Query" >
                    <input type="Submit" name="submit"  id="but" value="Search" >
                </form>
            </div>
            
            <div style="all:unset;display:grid;justify-content: center;  align-items: center; ">
                <table style="table-layout: fixed;margin: 0 auto; width:90%; ">
		            <tr><th>Log ID:</th><th>Action:</th><th>Performed By<br>(UserID_Username):</th><th>Role:</th><th>Old Data:</th><th>New Data:</th><th>Performed Date:</th><th>Performed Time:</th></tr>
                    <?php if(isset($_GET['submit']))
                        {
                            $searchquery = $_GET['searchquery'];
                            search($searchquery);}
                        else{
                            search("");
                        }?> 
		        </table> 
            </div>

        </div>
		
 </body>
</html>