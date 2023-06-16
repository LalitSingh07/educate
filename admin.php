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


      <div class="sidebarOption " onclick=" posti()" id="homefeed" >
        <span class="material-icons" > home </span>
        <h2 >posts</h2>
      </div>

      <div class="sidebarOption" id="Examfeed" onclick= "userslist()" >
      <span class="material-icons">
question_answer
</span>
        <h2>userlist</h2>
      </div>

      <div class="sidebarOption" id="notesfeed" onclick="notespanel()">
        <span class="material-icons"> list_alt </span>
        <h2>Notes</h2>
      </div>
      <a href="home.php"><div class="sidebarOption" >
        <span class="material-icons">home</span>
        <h2>home</h2>
      </div></a>

      

    
    </div>

    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2   id="feed_heading">Admin panel</h2>
      </div>

      <div class="adminpanel">
        <div class="adminpost" id="adminposts">
        </div>
      </div>

      <div class="error-field" id="error-field" ></div>
      <div class="notes-question" id="notes-question">
      <h3>upload notes</h3>
        <form  class="notesform">
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

                  <div class="notes-grid">
                  <label for="subjectname">subjectname:</label>
                    <input type="text" name="subjectname" id="subjectname">
                  </div>

                  <div class="notes-grid">
                  <label for="file">file:</label>
                    <input type="file" name="file" id="file">
                  </div>


                  <input type="submit" value="Submit">

                </div>
      
        </form>

     <h3>upload question paper</h3>
        <form  class="questionform">
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

                  <div class="notes-grid">
                  <label for="type">type</label>

                  <select id="type" name="type">
                    <option value="mid">mid</option>
                    <option value="end">end</option>
                   
                  </select>
                  </div>

                  <div class="notes-grid">
                  <label for="subjectname1">subjectname:</label>
                    <input type="text" name="subjectname1" id="subjectname1" >
                  </div>

                  <div class="notes-grid">
                  <label for="file1">file:</label>
                    <input type="file" name="file1" id="file1">
                  </div>


                  <input type="submit" value="submit">

                </div>
      
        </form>
     

      </div>
   </div>
     <!-- --------------------------------------------------------------------------------------- -->
    <!---------------------------------------- feed ends ------------------------------------------->
    <!-- ---------------------------------------------------------------------------------------- -->

    <!-- --------------------------------------------------------------------------------------- -->
    <!------------------------------------ widgets starts ----------------------------------------->
    <!-- --------------------------------------------------------------------------------------- -->
  
    
    <!-- --------------------------------------------------------------------------------------- -->
    <!------------------------------------ widgets ends-- ----------------------------------------->
    <!-- --------------------------------------------------------------------------------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
$(document).ready(function() {
  $('.notesform').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the selected values
    var courses = $('#courses').val();
    var Semester = $('#semester').val();
    var subjectName = $('#subjectname').val();
    var file = $('#file')[0].files[0];

    // Create a new FormData object
    var formData = new FormData();

    // Append the selected values and file to the form data
    formData.append('courses', courses);
    formData.append('semester', Semester);
    formData.append('subjectName', subjectName);
    formData.append('file', file);

    // Send an AJAX request to submitnotes.php
    $.ajax({
      url: 'php/submitnotes.php',
      type: 'POST',
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from automatically setting the content type
      success: function(response) {
        $("#error-field").html(response);
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

<script>
$(document).ready(function() {
  $('.questionform').submit(function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the selected values
    var courses = $('#courses1').val();
    var semester = $('#semester1').val();
    var type = $('#type').val();
    var subjectName = $('#subjectname1').val();
    var file = $('#file1')[0].files[0];

    // Create a new FormData object
    var formData = new FormData();

    // Append the selected values and file to the form data
    formData.append('courses', courses);
    formData.append('semester', semester);
    formData.append('type', type);
    formData.append('subjectName', subjectName);
    formData.append('file', file);

    // Send an AJAX request to a PHP file
    $.ajax({
      url: 'php/submitquestion.php',
      type: 'POST',
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from automatically setting the content type
      success: function(response) {
        // Handle the response
        $("#error-field").html(response);
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
      
    <script src="./javascript/admin.js"></script>
</body>
</html>