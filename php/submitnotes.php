<?php 

include_once 'db.php';

$courses = $_POST['courses'];
$semester = $_POST['semester'];
$subjectname = $_POST['subjectName'];

//checking field are not empty
if(!empty($courses) && !empty($semester ) && !empty($subjectname) )
{
    if(isset($_FILES['file'])) 
    {
        $img_name =$_FILES['file']['name']; 
        $img_typ = $_FILES['file']['type']; 
        $tmp_name = $_FILES['file']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_extension = end($img_explode); 
        $extensions = ['pdf']; //these are some valid image extensions
        if(in_array($img_extension, $extensions) === true)
        {
            
            $time = time();
            $newimagename = $time . $img_name; //creating a unique name for image
            
            if(move_uploaded_file($tmp_name, "../notes/" .$newimagename)) 
            {
                
                    $sql = mysqli_query($conn, "INSERT INTO notes (course, sem, subject , filename ) VALUES ('$courses', '$semester','$subjectname', '$newimagename')");
                    
                    if($sql){
                        echo "success";
                    }else{
                        echo "database error";
                    }
                    

              
                }

            
            

        }
        else{
            echo"please select a pdf";
        }
       
    }
    else{
        echo "please select a pdf";
    }
}
else
{
    echo " Please fill all required fields";
}


?>