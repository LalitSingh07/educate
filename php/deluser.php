<?php
 
   include_once 'db.php';
   $liked = $_POST['deleteid'];
  
 

  $result = mysqli_query($conn, "DELETE FROM users WHERE id ='{$liked}' ");
  echo "$liked";
  
?>