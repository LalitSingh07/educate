<?php
 
   include_once 'db.php';
   $liked = $_POST['deleteid'];
  
 

  $result = mysqli_query($conn, "DELETE FROM posts WHERE post_id ='{$liked}' ");
  echo "$liked";
  
?>