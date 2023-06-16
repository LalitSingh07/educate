<?php 
    session_start();
   include_once 'db.php';
   $unique_id = $_SESSION['unique_id'];
   $liked = $_POST['id'];
   if(isset($_POST['how']))
   {
    
    $sql1= mysqli_query($conn, "SELECT * FROM likes where liker = '{$unique_id}' and liked= '{$liked}' ");
    
    if (mysqli_num_rows( $sql1) == 0){
        $sql2= mysqli_query($conn, " UPDATE posts set `likes`= likes+1 WHERE post_id = $liked ");
        if($sql2)
        {
            $sql2= mysqli_query($conn, " INSERT INTO `likes`(`liker`, `liked`) VALUES ('{$unique_id}','{$liked}') ");
            echo "liked";
        }
        

    }
    else
    {
        $sql3= mysqli_query($conn, " UPDATE posts set `likes`= likes-1 WHERE post_id = $liked ");
        
        if($sql3)
        {
            $sql4= mysqli_query($conn, " DELETE FROM `likes` WHERE liker = '{$unique_id}' and liked= '{$liked}' ");
            echo "disliked";
        }
    }
   }
   ?>