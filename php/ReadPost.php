<?php
include_once 'fetchuser.php';


$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY post_id DESC;");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      $pstid=$row['post_id'];
      $prflimg = 'images/'.$row["image"];
      $postimg = 'POSTIMAGE/'.$row["post_img"];

      $result1 = mysqli_query($conn, "SELECT * FROM comments where postid = '{$pstid}' ");
        if (mysqli_num_rows($result1) > 0) {
          $cmntno = mysqli_num_rows($result1);
        }else{
          $cmntno ='0';
        }

      $result2 = mysqli_query($conn, "SELECT * FROM posts where post_id = '{$pstid}' ");
        if (mysqli_num_rows($result2) > 0) {
          $likeno = $row["likes"];
        }else{
          $likeno ='0';
        }
     
      $result3 = mysqli_query($conn, "SELECT * FROM likes where liker = '{$unique_id}' and liked= '{$pstid}'");
      if (mysqli_num_rows($result3) == 0) {
          $heart =  'favorite_border';
        }else{
          $heart ='favorite';
        }
     
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
        <span class="likes">
        <span class="material-icons" onclick="likes()" id='.$row['post_id'].'> '.$heart. '</span>
        <span class="likenumber">'.$likeno.'</span>
        </span>

        <span class="comments">
        <span class="material-icons commenticon" id='.$row['post_id'].' onclick="comment()"> comment </span>
        <span class="commentnumber">'.$cmntno.'</span>
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