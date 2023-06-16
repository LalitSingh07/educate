<?php
include_once 'fetchuser.php';


$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY post_id DESC;");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      $pstid=$row['post_id'];
      $prflimg = 'images/'.$row["image"];
      $postimg = 'POSTIMAGE/'.$row["post_img"];
      
        echo "<div class ='post'>";
        echo '
        <div class="post__avatar">
            <img src= '.$prflimg.' alt="sad"/>
        </div>
        ';
        
        echo '
       
        <div class="post__body" >
        <div class="post__header">
          <div class="post__headerText">
            
        ';
        echo "<h3>" . $row['fname']." " . $row['lname'] . "</h3>";
        echo  "</div>";
        echo  ' <div class="post__headerDescription"> ';

        echo '<p>'. $row['text'] .'</p>'.'</div>'.'</div>';
        echo ' <img src='.$postimg.' alt=""/>';
        echo ' <div class="post__footer" >
        <span class="material-icons" onclick="delpostadmin()" id='.$row["post_id"].'>
        delete_outline
        </span>
        
       </div>
     </div>
   </div>
   ';
    }
} else {
    echo "No post yet";
}

// Close connection
mysqli_close($conn);
?> 

<!-- <span class="material-icons"> publish </span> -->