<?php
   session_start();
   include_once 'db.php';
   $unique_id = $_SESSION['unique_id'];
   $sql2 = "SELECT*FROM users WHERE unique_id = $unique_id";
   $result = mysqli_query($conn, $sql2);
   if (mysqli_num_rows($result) > 0) {
     // fetch the result and store them in variables
     while ($row = mysqli_fetch_assoc($result)) {
       $fname = $row["fname"];
       $lname = $row["lname"];  
       $image = $row["image"];  
       $cover = $row["cover"];  
       $verification_status = $row["verification_status"];  
       $Role = $row["Role"];  
       $bio = $row["bio"];  
       $location = $row["location"];  
       $birthday = $row["birthday"];  
       $social_media = $row["social_media"];  
       $joining = $row["joining"];  
     }
   } ?>