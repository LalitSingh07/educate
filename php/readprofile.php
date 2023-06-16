<?php
include_once 'fetchuser.php';
$result = mysqli_query($conn, "SELECT * FROM posts WHERE uniqueId = $unique_id ORDER BY post_id DESC;");
$profileimg = 'images/'.$image;
$coverimg = 'coverimg/'.$cover;
$postNo=mysqli_num_rows($result);
    echo '
    <div class="flexcontainer">
        <div class="middlecontainer">
             <section class="headsec">
                 <div>
                    <h3>'.$fname.' '.$lname.'</h3>
                    <span>'.$postNo.' posts</span>
                 </div>
            </section>
            <section class="twitterprofile">
            <div class="headerprofileimage">' 
 ;
    echo '
                <img src='.$coverimg.' alt="" id="headerimage">
                <img src='.$profileimg.' alt="" id="profilepic">
                <div class="editprofile" id="editprofile" onclick="editprofl()">Edit Profile</div>
            </div>
            <div class="bio">
            <div class="handle"><br>
                <h3>'.$fname.' '.$lname.'</h3>
                
            </div>
            <p>'.$bio.'</p>
            <span> 
            <i class="fa fa-location-arrow "></i> '.$location. '
            <br>
            <a href='.$social_media. '> 
              <i class="fa fa-external-link" aria-hidden="true"></i>'.$social_media. ' 
            </a> 
                 <br>     
            <i class="fa fa-birthday-cake" aria-hidden="true"></i> Born '.$birthday.'
          </span>
          <br> 
          <span>
            <i class="fa fa-calendar"></i> Joined '.$joining.' 
          </span>
          </div>
          </section>
          ' 
 ;
echo '
<section class="tweets">
    <div class="heading">
        <p>User posts</p>
        
    </div>
</section>
<section class="mytweets">';


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
      <span class="material-icons" onclick="likes1()" id='.$row['post_id'].'> '.$heart. '</span>
      <span class="likenumber">'.$likeno.'</span>
      </span>
      <span class="material-icons"  onclick="deletepost()" id='.$row['post_id'].'>
delete_outline
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

echo '</section>
</div>

</div>
</div>';


 ?>
























<!-- 
<div class="profilebox" id="profilebox">
     <div class="flexcontainer">
        <div class="middlecontainer">
            <section class="headsec">
                
                <div>
                    <h3>Soy Segun</h2>
                        <span>38.7k Tweets</span>
                </div>
            </section>
            <section class="twitterprofile">
                <div class="headerprofileimage">
                    <img src="https://res.cloudinary.com/dowrygm9b/image/upload/v1570267399/laptop-3174729_yiprzu.jpg" alt="header" id="headerimage">
                    <img src="https://res.cloudinary.com/dowrygm9b/image/upload/v1570267399/laptop-3174729_yiprzu.jpg" alt="profile pic" id="profilepic">
                    <div class="editprofile">Edit Profile</div>
                </div>
                <div class="bio">
                    <div class="handle">
                        <h3>Soy Segun</h3>
                        <span>@segun_OS</span>
                    </div>
                    <p>bio here</p>
                  
                    <span> 
                      <i class="fa fa-location-arrow "></i> Lagos, Nigeria.
                      
                      <a href="#"> 
                        <i class="fa fa-external-link" aria-hidden="true"></i>linkedin.com/in/segun-olani… 
                      </a> 
                                
                      <i class="fa fa-birthday-cake" aria-hidden="true"></i> Born November 10
                    </span>
                    <br> 
                    <span>
                      <i class="fa fa-calendar"></i> Joined May 2013
                    </span>
                   
                </div>
            </section>

            <section class="tweets">
                <div class="heading">
                    <p>posts</p>
                    
                </div>
            </section>
            <section class="mytweets">
             
            </section>
        </div>

     </div>
    </div> -->