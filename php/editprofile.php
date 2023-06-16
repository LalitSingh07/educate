<?php 

include_once 'db.php';
include_once 'fetchuser.php';

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$bio1 = $_POST['bio'];
$location1 = $_POST['location'];
$Links = $_POST['Links'];
$birthdate= $_POST['birthdate'];

if(!empty($bio1)){
    $bio2 = $bio1;
}else{
    $bio2= $bio;
}
if(!empty($location1)){
    $location2 = $location1;
}else{
    $location2 = $location;
}

if(!empty($Links)){
    $Links1 =$Links;
}else{
    $Links1=$social_media ;
}

if(!empty($birthdate)){
    $birthdate1 =$birthdate;
}else{
    $birthdate1 =  $birthday ;
}

if(isset($_FILES['cimage'])) 
{
    $img_name = $_FILES['cimage']['name']; //getting image name
    $img_typ = $_FILES['cimage']['type']; //getting image type
    $tmp_name = $_FILES['cimage']['tmp_name'];
    $img_explode = explode('.', $img_name);
    $img_extension = end($img_explode); 
    $extensions = ['png', 'jpeg', 'jpg']; //these are some valid image extensions
    if(in_array($img_extension, $extensions) === true)
    {
        
        $time = time();
        $newimagename = $time.$img_name; //creating a unique name for image
        
        move_uploaded_file($tmp_name, "../coverimg/" .$newimagename);

        $newimagename1=$newimagename;

        }   
}
else{
    $newimagename = $cover;

}

if(!empty($firstname) && !empty($lastname)){

    $firstname1= $firstname;
    $lastname1= $lastname;
}else{
    
    $firstname1=  $fname ;
    $lastname1= $lname;
}




    if((!empty($bio1)||!isset($_FILES['cimage']) ||!empty($birthdate) ||!empty($Links) ||!empty($location1)) ||(!empty($firstname) 
    ||!empty($lastname)) ){

        if(!empty($firstname) && !empty($lastname)){

            $sql = mysqli_query($conn, "UPDATE users SET fname = '{$firstname1}', lname = '{$lastname1}',cover = '$newimagename1',bio= '{$bio}',location ='{$location1}',birthday ='{$birthdate1}',social_media='{$Links1}'
            WHERE unique_id= '{$unique_id}';");
 

        }
        else if(empty($firstname) && empty($lastname))
        {
            $sql = mysqli_query($conn, "UPDATE users SET fname = '{$firstname1}', lname = '{$lastname1}',cover = '$newimagename1',bio= '{$bio}',location ='{$location1}',birthday ='{$birthdate1}',social_media='{$Links1}'
            WHERE unique_id= '{$unique_id}';");
        
        }else   {
            echo "$time";
        }

       

    }
    else
    {
        
            echo "please fill the fields ";
    
    }












// //checking field are not empty
// if(!empty($bio) && !empty($location) && !empty($Links ) && !empty($birthdate))
// {
//     if(isset($_FILES['cimage'])) 
//     {
//         $img_name = $_FILES['cimage']['name']; //getting image name
//         $img_typ = $_FILES['cimage']['type']; //getting image type
//         $tmp_name = $_FILES['cimage']['tmp_name'];
//         $img_explode = explode('.', $img_name);
//         $img_extension = end($img_explode); 
//         $extensions = ['png', 'jpeg', 'jpg']; //these are some valid image extensions
//         if(in_array($img_extension, $extensions) === true)
//         {
            
//             $time = time();
//             $newimagename = $time . $img_name; //creating a unique name for image
            
//             if(move_uploaded_file($tmp_name, "../coverimg/" .$newimagename)) 
//             {
//                 if(!empty($firstname) && !empty($lastname))
//                 {
//                     $sql = mysqli_query($conn, "UPDATE users SET fname = '{$firstname}', lname = '{$lastname}',cover = '{$newimagename}',bio= '{$bio}',location ='{$location}',birthday ='{$birthdate}',social_media='{$Links}'
                    
//                     WHERE unique_id= '{$unique_id}';");
                    
//                     if($sql){
//                         echo "success";
//                     }else{
//                         echo "database error";
//                     }
                    

//                 }else
//                 {
//                     $sql2 = mysqli_query($conn, "UPDATE users SET cover = '{$newimagename}',bio= '{$bio}',location ='{$location}',birthday ='{$birthdate}',social_media='{$Links}'
                    
//                     WHERE unique_id= '{$unique_id}';");
//                     if($sql2){
//                         echo "success";
//                     }else{
//                         echo "database error";
//                     }
//                 }

//             }else
//             {
//                     echo "nhi hua";
//             }
            

//         }
//         else{
//             echo"please select an image with extension jpg png jpeg";
//         }
       
//     }
//     else{
//         echo " image not set";
//     }
// }
// else
// {
//     echo " Please fill all required fields";
// }


?>