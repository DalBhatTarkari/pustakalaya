<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/goback.php";
  require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
  $id=$_GET['id'] ?? "1";
  $_GET['from'] = $_GET['from'] ?? "books";
  $book=getbook($id,$_GET['from']) ?? ['cover' => "" , 'file_path' => ""] ;
  $title = $book['title']?? "";
  $cover = $book['cover']?? "";
  $author = $book['author']?? "";
  $genre = $book['genre']?? "";
  $description = $book['description']?? "";
  $path = $book['file_path']?? "";
  $initialstatus = $book['status'] ?? "approved";

  $old_data = $book + [
    'status' => $book['status'] ?? "approved"
  ];

  $action = "disabled";
  if(!empty($_SESSION['role']) ){
    if($_SESSION['role'] != "user"){$action = "";}
  }
  
?>

<html>
  <head>
    <title><?php echo strtoupper($title);?></title>
    <link href="/pustakalaya/log_reg_style.css" type="text/css" rel="stylesheet">
    <style>
        body{
          background-color: rgb(27, 27, 27);
          display:grid;
          justify-content: center;
          align-items: center;
          text-align: center;
          overflow-y : hidden;
        }
        #message{
        all:unset;
        font-size:12;
        position: fixed;
        padding: 0 0 0 25px;
        font-weight: bold;
        color: rgb(255, 0, 0);
        }
        .form-container{
          all : unset;
          position: relative;
          background-color: rgb(68, 68, 68);
          color:white;
          width: 100%;
          padding:20px;
          min-width: 300px;
          border-radius: 25px;
        }
        img{
            max-width: 200px;
            height: 300px;
        }
        div{
        height:90%;
        }
        button,a{
          
          all:unset;
          padding:0 10 0 10px;
          color:white;
          width:75%;
          border-radius: 10px;
          border:2px solid rgb(24, 61, 24);
          background-color:rgb(52, 159, 52);
          cursor:pointer;
        }
        table{
          all:unset;
          padding:10px;
          border-spacing: 0 10px;
        }
        
    </style>
  </head>
  <body>
    <div class="form-container">
      <?php goback(); 
      if($book['cover'] == NULL){
        $cover = "/pustakalaya/defaults/cover.jpg";       
    }else{
        $cover = $book['cover'];
    }
    ?>
            <br><br>
            <img src='<?php echo $cover;?>'><br>
			<form method="POST">
			 <table style="margin: auto;"> 
				<tr><th>Title:</th><td><input type="text" name="title" placeholder="Enter Book Title" required <?php echo 'value="'.$title.'" ' .$action;?>></td></tr>
				<tr><th>Author<td><input type="text" name="author" placeholder="Author Name" required <?php echo 'value="'.$author.'" ' .$action;?>></td></tr>
				<tr><th>Genre:</th><td><input type="text" name="genre"  required placeholder="Fantasy,action,comedy,etc" required <?php echo 'value="'.$genre.'" ' .$action;?>></td></tr>
				<tr><th>Description:</th><td><textarea name="description" placeholder="Enter Book Description" required maxlength="500" <?php echo $action;?> ><?php echo $description ?></textarea></td></tr>
        <?php
          if($action == ""){
            echo '<tr><th>Cover:</th><td><input type="text" name="cover" placeholder="Enter Cover Page URL"  value="' . $cover . '" ' . $action . '></td></tr>';
            echo '<tr><th>File_Path:</th><td><input type="text" name="path" placeholder="Enter file path"  value="' . $path . '" ' . $action . '></td></tr>';
          }
             echo '<tr><th>Status:</th><td>
             <select name="status"';echo $action.($initialstatus === 'approved' ? ' disabled' : '').'>
                 <option value="approved"' . ($initialstatus === 'approved' ? ' selected' : '') . '>Approved</option>
                 <option value="declined"' . ($initialstatus === 'declined' ? ' selected' : '') . '>Declined</option>
                 <option value="pending"' . ($initialstatus === 'pending' ? ' selected' : '') . '>Pending</option>
             </select>
             </td></tr>';

             if ($book['file_path'] == NULL ) {
              echo "<tr><td></a><button type='button' id='read' style=' z-index:99; cursor:not-allowed; background-color:rgb(120, 187, 120);'>Not Available Yet</button></td></tr>";
              
             } else {
              echo "<tr><td><button type='button' style='z-index:99;' id='read' onclick=\"window.location.href='/pustakalaya/books/".$book['file_path']."'\">Read Here</button></td>";
              echo "<td><a href = '/pustakalaya/books/".$book['file_path']."' download>Download</a></td></tr>";
              }
        ?>
             
             <?php
          if($action == ""){
            echo '<tr><td><button name="request" >Save</button></td> ';
            if($initialstatus == "approved")
                echo '<td><button name="delete" style="width:70px;">Delete</button></td></tr>';
            }
            
        ?></table><br>
			 
			</form>	
    </div>
  </body>
</html>
<?php
  if(isset($_POST['request']) && $action == "")
  {
    if($_GET['from']=='books'){
      $finalstatus = 'approved';
    }else{
      $finalstatus = $_POST['status'] ?? 'pending';
    }
    $inputs = [
      'title' => trim($_POST['title'] ?? ""),
      'author' => trim($_POST['author'] ?? ""),
      'genre' => trim($_POST['genre'] ?? ""),
      'description' => trim($_POST['description'] ?? ""),
      'finalstatus' => $finalstatus
    ];
    $cover  = $_POST['cover']  ?? "NULL";
    $path   = $_POST['path']   ?? "NULL";

    $new_data = [
      'id' => $id,
      'title' => trim($_POST['title'] ?? ""),
      'cover' => trim($_POST['cover']  ?? "NULL"),
      'author' => trim($_POST['author'] ?? ""),
      'genre' => trim($_POST['genre'] ?? ""),
      'description' => trim($_POST['description'] ?? ""),
      'path' => trim($_POST['path']  ?? "NULL"),
      'status' => $finalstatus

    ];
    
    
    if(changebookstatus($id,$inputs,$cover,$path,$initialstatus,"")){
        $_SESSION['message'] = "Book status changed sucessfully";
        logaction("edit",$old_data,$new_data);
    }else{
        $_SESSION['message'] = "Failed to change Book status";
    }
    header("Location: /pustakalaya/roles/users/dash.php");
  }

  if(isset($_POST['delete']) && $action == "")
    {
      $inputs = [
        'title' => trim($_POST['title'] ?? ""),
        'author' => trim($_POST['author'] ?? ""),
        'genre' => trim($_POST['genre'] ?? ""),
        'description' => trim($_POST['description'] ?? ""),
        'finalstatus' => trim($_POST['status'] ?? 'pending')
      ];
      $cover  = $_POST['cover']  ?? "NULL";
      $path   = $_POST['path']   ?? "NULL";
  
      $new_data = ['deleted' => true];
      
      if(changebookstatus($id,[],"","","","delete")){
          $_SESSION['message'] = "Book deleted sucessfully";
          logaction("delete",$old_data,$new_data);
      }else{
          $_SESSION['message'] = "Failed to delete Book status";
      }
      header("Location: /pustakalaya/roles/users/dash.php");
    }
?>

