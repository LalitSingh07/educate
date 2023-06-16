<?php
 include_once 'db.php';
 $selectedCourse1 = $_POST['courses1'];
$selectedSemester1 = $_POST['semester1'];
 $sql3 = mysqli_query($conn,"SELECT*FROM exams WHERE course='$selectedCourse1' AND sem='$selectedSemester1'");
 if (mysqli_num_rows($sql3) > 0) 
 {
    while ($row = mysqli_fetch_assoc($sql3))
    {
      $link = 'papers/'.$row["filename"];
      $subjectname = $row["subject"];
      echo '<div class="wrapper">
              <div class="container">
                <div class="row">
                  <div class="card">
                    <div class="info">';
     
                      echo '<div class="sub">'.$row["subject"].'</div>';
                     
                      echo '<div class="title">Semester : ' .$row["sem"].' ('. $row["type"].')</div>';
                      echo '<div class="title">course : ' .$row["course"].'</div>';
                      echo '<a href='.$link.' download><button class="btn">DOWNLOAD</button></a>';
                    echo '</div>';
                    echo '<div class="image">
                                  <i class="fa-solid fa-note-sticky"></i>
                          </div>';
                    echo '  </div>
                    </div>
                  </div>
                </div>';


    }
 }else{
  echo "kuch nhi h";
 }


?>