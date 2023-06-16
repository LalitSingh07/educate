<?php
  $server_name="localhost";

  $username="root";

  $password="";

  $database_name="studentform";

  $conn=mysqli_connect($server_name,$username,$password,$database_name,3306);

  // Check connection
  if (mysqli_connect_error()) {
      echo "Connection establishing failed!";
  }

?>