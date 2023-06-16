<?php
 session_start();
   include_once 'db.php';
   $unique_id = $_SESSION['unique_id'];
if (isset($_POST["id"])) {
  $ids = $_POST["id"];
  
      echo '
      
        <div class="commentcontainer">
          <div class="commenthead">
               <h3>Comments</h3>
               <i class="fa-solid fa-xmark" onclick="commentclose()" ></i>
          </div>
            <div class="commentform">
              
                <div class="error-text"></div>
                <div class="edit_profile_grid">
                    <div class="input">
                      <label for="comment">ENTER YOUR COMMENTS</label>
                      <input type="text" name="comment" id="textarea" >
                      <input type="text" name="postids" id="postids" class="button" style="display:none;" value='.$ids.'>
                    </div>
                  </div>
                  <div class="submit1">
                    <input type="submit" value="comment" class="button" onclick="commentpost()" id='.$ids.'>
                   </div>
                
             </div>
       <div class="postcomments" id="postcomments">
      ';
      $result = mysqli_query($conn, "SELECT * FROM comments where postid = $ids ORDER BY time DESC;");
      if (mysqli_num_rows($result) > 0){
    
      
         // fetch the result and store them in variables
         while ($row = mysqli_fetch_assoc($result)) 
         {
    
          $userid =$row["userid"];
          $time =$row["time"];
          $comment =$row["comment"];
          $result1 = mysqli_query($conn, "SELECT*FROM users WHERE unique_id = $userid;");
    
          if (mysqli_num_rows($result1) > 0)
          { 
            while ($row = mysqli_fetch_assoc($result1)) 
            {
              $image = $row["image"];  
              $fname = $row["fname"];
              $lname = $row["lname"];
            }
    
    
          }

       // -------------------------commenton------------- 
        echo '<div class="cooment-grid">
        <div class="heads">
          <img src= images/'.$image.' alt="">
          <span class="user-time">
            <h4>'.$fname.' '.$lname.'</h4>
            <h5>'.$time.'</h5>
          </span>
        </div>
        <div class="cmntsection">'.$comment.'
        </div>
        </div>

      </div>
        ';
        }
    }else
    {

      echo '
      
      srry  no comments yet !!
    ';

      echo '
      </div>

    </div>
      ';
    }
 
        
     }

?>

