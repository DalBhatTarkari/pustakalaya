<?php
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/ud_functions.php";
    require $_SERVER['DOCUMENT_ROOT']."/pustakalaya/db.php";
function search($searchquery,$page,$db){
    if($db != ""){
        $db="req";
    }else{
        $db="books";
    }
    global $conn;
    $offset = 4* ((int)$page-1);

    $searchquery=['query' => $searchquery];

    if(validateuip($searchquery)){
        $searchquery= $searchquery['query'];
        $sql = "SELECT id, title, cover ,author, genre, description, file_path  FROM $db
        WHERE title LIKE '%$searchquery%'
           OR author LIKE '%$searchquery%'
           OR genre LIKE '%$searchquery%'
           OR description LIKE '%$searchquery%'
           ORDER BY title ASC
           LIMIT 4 OFFSET $offset";
        $result = mysqli_query($conn,$sql);
        $numrow=mysqli_num_rows($result);
        if($numrow == 0){
            $message = "No results for ' ". $searchquery ." '.";
            echo"<p id='message'> ".$message."</p> ";
            $message = "";
        } else{

            if($searchquery!= ""){$message = "Searching for ' ". $searchquery ." '.";}
            else { $message = "";}
            
            echo "<p id='message'> ".$message."</p> ";
            echo"<div class='container'>";
            $i = 1;
            while($book = mysqli_fetch_assoc($result)){     //selects each individual row (book) in the database
                if($book['cover'] == NULL){                                                     /*----*/
                    $cover = "/pustakalaya/defaults/cover.jpg";                                     // |
                                                                                                    // |              
                }else{                                                                              // |------ //for default covepage
                    $cover = $book['cover'];                                                        // |
                }                                                                                   // |

                echo "<div class='bookcard' id=".$book['id'].">
                    <a style='all:unset;cursor:pointer;' href='/pustakalaya/roles/book.php?id=". $book['id'] ."&from=".$db."'>
                    <img src='" . $cover . "'>
                    <center><h2>" . $book['title'] . "</h2>
                    <h3>" . $book['author'] . "</h3>";

                    if ($book['file_path'] == NULL) {
                            echo "</a><button id='read' style=' z-index:99; cursor:not-allowed; background-color:rgb(120, 187, 120);'>Not Available Yet</button>";
                            
                    } else {
                        echo "</a><button style='z-index:99;' id='read' onclick=\"window.location.href='/pustakalaya/books/" . $book['file_path'] . "'\">Read Here</button>";
                    }
                echo "</div>";
            }$message = "";
            echo"</div>";
        }





        $sql = "
        SELECT id, title, cover ,author, genre, description, file_path FROM $db
        WHERE title LIKE '%$searchquery%'
           OR author LIKE '%$searchquery%'
           OR genre LIKE '%$searchquery%'
           OR description LIKE '%$searchquery%'
           ORDER BY title ASC";
        $totalnumrow=mysqli_num_rows(mysqli_query($conn,$sql));
    }
    return $totalnumrow;
}
?>