<?php 

session_start();
include 'db.php';
$unique_id = $_SESSION['unique_id'];
$comments = $_POST['comments'];
$postids = $_POST['postids'];
if(!empty($comments)){
$resul = mysqli_query($conn, "insert into comments(postid,comment,userid) values('{$postids}','{$comments}','{$unique_id}');");
if($resul){
    echo "success";
}
}
?>