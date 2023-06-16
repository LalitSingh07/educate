<?php
session_start();
include 'php/db.php';
$unique_id = $_SESSION['unique_id'];
if(empty($unique_id)){
header("Location: login.php");
}
$qry = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
if(mysqli_num_rows($qry) > 0) {
  
$row = mysqli_fetch_assoc($qry);
if ($row) {
  $fname = $row["fname"];
  $lname = $row["lname"];  
  $image = $row["image"]; 

  $_SESSION['verification_status'] = $row['verification_status'];
if($row['verification_status'] != 'Verified'){
header("Location: verify.php");
}
}
}
?>

<?php
  if(!isset($pageTitle)){
      $pageTitle="hello | educate";
     
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
   

    <link rel="stylesheet" href="styles/homefeed.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/91e6b6d0dc.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- sidebar starts -->
    <div class="sidebar">
    <i class="fa-solid fa-book"></i>
    <span class = "prjname">Edu-aide</span>


      <div class="sidebarOption " onclick="testi()" id="homefeed" >
        <span class="material-icons" > home </span>
        <h2 >Home</h2>
      </div>

      <div class="sidebarOption" id="Examfeed">
      <span class="material-icons">
         question_answer
       </span>
        <h2>question paper</h2>
      </div>

      <div class="sidebarOption" id="notesfeed">
        <span class="material-icons"> list_alt </span>
        <h2>Notes</h2>
      </div>

      <div class="sidebarOption" id="profilefeed">
        <span class="material-icons"> perm_identity </span>
        <h2>Profile</h2>
      </div>
<?php 
$qry1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
if(mysqli_num_rows($qry1) > 0) {
  
$row = mysqli_fetch_assoc($qry1);
if ($row) {
  $fname = $row["fname"];
  $lname = $row["lname"];  
  $image = $row["image"]; 
  $role = $row["Role"]; 
  if($role == "admin"){
    echo '<a href="admin.php"><div class="sidebarOption" >
    <span class="material-icons">admin_panel_settings</span>
    <h2>admin</h2>
  </div></a> '; }}}?>
      
      <div class="sidebarOption" id="profilefeed" onclick="destroySessionAndLogout()">
        <span class="material-icons"> logout </span>
        <h2>logout</h2>
      </div>

    </div>

    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2   id="feed_heading">Home</h2>
      </div>

      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- tweetbox start --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
     
      <div class="tweetBox" id="tweetBox">
        <form>
          <div class="tweetbox__input">
            <?php 
              $postprofile = 'images/'.$image;
              echo ' <img src='.$postprofile.' alt="profile"/>';
            ?>
              <input type="text" id="text" name="text">  
            </div>
           <div class="iconholder">
           <button type="button" class="tweetBox__tweetButton " onclick="saveText()">Post</button>
              <div class="profile-img">
            <div class="file-upload">
                <input type="file" id="image-preview" name="image" class="file-input" required oninvalid="this.setCustomValidity('Select an image')" oninput="this.setCustomValidity('')" >
               <i class="fa-regular fa-image"></i>
            </div>
           </div>
            
        </div>
        </form>
      </div>
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- tweetbox ends --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->


      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- exambox starts --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->

      <div  id="exambox" class="exambox">
            <form class="search-form1">
                <div>
                  <div class="notes-grid">
                    <label for="courses1">Courses:</label>

                    <select id="courses1" name="courses1">
                      <option value="BCA">BCA</option>
                      <option value="MCA">MCA</option>
                      <option value="B.tech(CSE)">B.tech(CSE)</option>
                      <option value="B.COM">B.COM</option>
                    </select>
                  </div>
                  <div class="notes-grid">
                  <label for="semester1">Semester:</label>

                  <select id="semester1" name="semester1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                  </div>
                  <input type="submit" value="Search">

                </div>
          </form>
      </div>
      
      <div id="examresult"></div>
      <div id="message"></div>
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- exambox ends --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->


      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- notesbox starts --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->

      <div  id="notesbox" class="notesbox">
            <form class="search-form">
                <div>
                  <div class="notes-grid">
                    <label for="courses">Courses:</label>

                    <select id="courses" name="courses">
                      <option value="BCA">BCA</option>
                      <option value="MCA">MCA</option>
                      <option value="B.tech(CSE)">B.tech(CSE)</option>
                      <option value="B.COM">B.COM</option>
                    </select>
                  </div>
                  <div class="notes-grid">
                  <label for="semester">Semester:</label>

                  <select id="semester" name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                  </div>
                  <input type="submit" value="Search">

                </div>
          </form>
      </div>
      
      <div id="result"></div>
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- notesbox ends --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->


      <!-- --------------------------------------------------------------------------------------- -->
      <!----------------------------------- profile box start --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->

    <div class="profilebox" id="profilebox">
      
    </div>

      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------- profile box ends --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->


      <!-- --------------------------------------------------------------------------------------- -->
      <!----------------------------------- edit profile box start ---------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->

    <div class="editprofilebox" id="editprofilebox">
      <div class="profilecontainer">
        <div class="edit_header">
          <h4>edit profile</h4>
          <i class="fa-solid fa-xmark" onclick="editproflclose()"></i>
        </div>
        <div class="edit_profile_form">
          <form id="editform">
            <div class="error-text"></div>
            <div class="edit_profile_grid">
              <div class="input">
                  <label for="fname">first name</label>
                  <input type="text" name="fname" placeholder="first name"  pattern="[a-zA-Z'-'\s]*">
              </div>

              <div class="input">
                  <label for="lname">last name</label>
                  <input type="text" name="lname" placeholder="last name"  pattern="[a-zA-Z'-'\s]*">
              </div>

            </div>

            <div class="edit_profile_grid">
              <div class="input">
                  <label for="bio">bio*</label>
                  <input type="text" name="bio" placeholder="bio" required="" >
              </div>

              <div class="input">
                  <label for="location">location*</label>
                  <input type="text" name="location" placeholder="location" required="" >
              </div> 

            </div> 
            <div class="edit_profile_grid">
              <div class="input">
              <label for="cimage">select cover photo*</label>
              <input type="file" id="image-preview" name="cimage" class="file-input" required="">
              </div>

             

            </div> 

            <div class="edit_profile_grid">
              <div class="input">
                  <label for="Links">Your Links *</label>
                  <input type="text" name="Links" placeholder="Your Links" required="" >
              </div>

              <div class="input">
                  <label for="birthdate">birthdate *</label>
                  <input type="date" name="birthdate" placeholder="birthdate" required="" ">
              </div> 
            </div>

            <div class="submit">
              <input type="submit" value="update profile" class="button">
            </div>
          </form>
        </div>
      </div>

    </div>

      <!-- --------------------------------------------------------------------------------------- -->
      <!---------------------------------edit profile box ends --------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
     
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ comment starts ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
     
     <div class="commentbox" id="commentbox">
        
     </div>
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ comment ends ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
     
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ post starts ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
        <div class="holder" id="holder"></div>
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ post ends----- ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
     
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ admin starts ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
   
      <!-- --------------------------------------------------------------------------------------- -->
      <!------------------------------------ admin ends----- ----------------------------------------->
      <!-- --------------------------------------------------------------------------------------- -->
   
   </div>
     <!-- --------------------------------------------------------------------------------------- -->
    <!---------------------------------------- feed ends ------------------------------------------->
    <!-- ---------------------------------------------------------------------------------------- -->


    
  </body>
<!-- --------------------------------------------------------------------------------------- -->
<!-- ------------------------------Scripts-------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------- -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/savepost.js"></script>

  <script src="javascript/homeoption.js"></script>
  <script>window.onload = function() 
  {
    testi();
  };
  </script>

  
  <script>
 $(document).ready(function() {
  $('.search-form').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the selected values
    var selectedCourse = $('#courses').val();
    var selectedSemester = $('#semester').val();

    // Send an AJAX request to fetch_data.php
    $.ajax({
      url: 'php/readnotes.php',
      type: 'POST',
      data: { courses: selectedCourse, semester: selectedSemester },
      success: function(response) {
        $("#result").html(response);
        console.log(response);
        // Do something with the data
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.log(error);
      }
    });
  });
});
  </script>
  <!-- ----------------------------------------------------------- -->
  <script>
 $(document).ready(function() {
  $('.search-form1').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the selected values
    var selectedCourse1 = $('#courses1').val();
    var selectedSemester1 = $('#semester1').val();

    // Send an AJAX request to fetch_data.php
    $.ajax({
      url: 'php/readexam.php',
      type: 'POST',
      data: { courses1: selectedCourse1, semester1: selectedSemester1 },
      success: function(response) {
        $("#examresult").html(response);
        console.log(response);
        // Do something with the data
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.log(error);
      }
    });
  });
});
  </script>
  <!-- ----------------------------------------------------------- -->
  
  <script src="./javascript/editprofile.js"></script>
 
<!-- --------------------------------------------------------------------------------------- -->
<!-- ------------------------------Scripts-------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------- -->


</html>
