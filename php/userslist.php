<?php
 
   include_once 'db.php';
   
   $sql2 = "SELECT*FROM users ";
   $result = mysqli_query($conn, $sql2);

   echo" <table border=1>
   <tr>
       <th>profile</th>
       <th>name</th>
       <th>verification_status</th>
       <th>Role</th>
       <th>joining</th>
       <th>birthday</th>
       <th>action</th>
   </tr>";


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
            $prflpic= 'images/'.$image;
echo" <tr>

            <td>  <img src=".$prflpic." height=40px width=40px></td>
            <td> ".$fname." ".$lname."</td>
            <td> ".$verification_status."</td>
            <td> ". $Role."</td>
            <td> ".$joining."</td>
            <td> ".$birthday."</td>
            <td> <span class='material-icons' onclick='deluser()'  id=".$row['id'].">
            delete_outline
            </span></td>

        </tr>";

 

     }
   }


   
   echo" </table>";

   
   ?>
