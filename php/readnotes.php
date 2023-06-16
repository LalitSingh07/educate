<?php
 include_once 'db.php';
 $selectedCourse = $_POST['courses'];
$selectedSemester = $_POST['semester'];
 $sql3 = mysqli_query($conn,"SELECT*FROM notes WHERE course='$selectedCourse' AND sem='$selectedSemester'");
 if (mysqli_num_rows($sql3) > 0) 
 {
    while ($row = mysqli_fetch_assoc($sql3))
    {
      $link = 'notes/'.$row["filename"];
      $subjectname = $row["subject"];
      echo '<div class="wrapper">
              <div class="container">
                <div class="row">
                  <div class="card">
                    <div class="info">';
     
                      echo '<div class="sub">'.$row["subject"].'</div>';
                     
                      echo '<div class="title">Semester : ' .$row["sem"].'</div>';
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
  echo "";
 }


?>

<!-- <div class="wrapper">
            <div class="container">
              <div class="row">
                <div class="card">
                    <div class="info">
                        <div class="sub">TITLE</div>
                        <div class="title">The titl.</div>
                        <button class="btn">DOWNLOAD</button>
                      </div>
                        <div class="image">
                            <i class="fa-solid fa-note-sticky"></i>
                        </div>
                  </div>
              </div>
            </div>
          </div> -->