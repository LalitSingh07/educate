<?php 
include_once 'db.php';
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = md5($_POST['pass']);
$cpassword = md5($_POST['cpass']);
$Role = 'user';
$verification_status = '0';

// -----------------------------------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Require PHPMailer autoloader
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


// ------------------------------------------------------------------


//checking field are not empty
if(!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword))

{
         //if email is valid

        if(filter_var ($email, FILTER_VALIDATE_EMAIL)) 
    {  

        //checking email is already exists!
         $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
         if(mysqli_num_rows($sql) > 0)
         {
            echo "$email ~ Already Exists";
         }
         else
        {
            // checking password and confirm password match
            if($password == $cpassword) 
            {
                // let's check user upload file or not
                if(isset($_FILES['image'])) 
                {
                    $img_name = $_FILES['image']['name']; //getting image name
                    $img_typ = $_FILES['image']['type']; //getting image type
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.', $img_name);
                    $img_extension = end($img_explode); 
                    $extensions = ['png', 'jpeg', 'jpg']; //these are some valid image extensions
                    if(in_array($img_extension, $extensions) === true)
                    {
                        
                        $time = time();
                        $newimagename = $time . $img_name; //creating a unique name for image
                        if(move_uploaded_file($tmp_name, "../Images/" .$newimagename)) //set the uploaded file store folder
                        {
                            $random_id = rand(time(), 10000000); //create a user unique id
                           
                            $otp = mt_rand(1111,9999); //creating 4 digits otp
                            // Insert data into table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, phone, password, image,otp, verification_status,Role)
                            VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$phone}', '{$password}', '{$newimagename}','{$otp}','{$verification_status}','{$verification_status}')");

                                 if($sql2)
                                    {
                                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                         if(mysqli_num_rows($sql3) >0)
                                        {
                                            $row = mysqli_fetch_assoc($sql3); //fetching data
                                            $_SESSION['unique_id'] = $row['unique_id'];
                                            $_SESSION['email'] = $row['email'];
                                            $_SESSION['otp'] = $row['otp'];
                                            //  start mail function
                                        
                                            if($otp)
                                            {
                                                // Create a new PHPMailer instance
                                                $mail = new PHPMailer(true);        
                                                $receiver = $email;
                                                $subject = "From: $fname $lname <$email>";
                                                $body = "Hello "." $fname $lname \n  your email". "$email \n has been registered please verify your otp is"."$otp";
                                                $sender = "From:lalitsingh99275910@gmail.com";
                                                try {
                                                    // SMTP server settings
                                                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                                    $mail->isSMTP();                                            // Send using SMTP
                                                    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                                                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                                    $mail->Username   = 'lalitsingh99275910@gmail.com';                  // SMTP username
                                                    $mail->Password   = 'mstkuwwxtycjvlgb';                   // SMTP password
                                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption
                                                    $mail->Port       = 587;                                    // TCP port to connect to; use 465 for SSL

                                                    // Sender and recipient settings
                                                    $mail->setFrom('lalitsingh99275910@gmail.com', 'Your Name');
                                                    $mail->addAddress($receiver, 'Recipient Name');
                                                    $mail->addReplyTo('lalitsingh99275910@gmail.com', 'Information');
                                                    // $mail->addCC('cc@example.com');
                                                    // $mail->addBCC('bcc@example.com');

                                                    // Email content
                                                    $mail->isHTML(true);                                        // Set email format to HTML
                                                    $mail->Subject = $subject;
                                                    $mail->Body    = $body;
                                                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                    // Send email
                                                    $mail->send();
                                                    echo  "success";
                                                } catch (Exception $e) {
                                                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                }
                                              
                                            }
                                        }
                                        else{
                                            echo "something went wrong";
                                        }
                                    

                                    }
                                    else{
                                        echo "something went wrong";
                                    }
                                    


                        }
                        

                    }
                    else{
                        echo"please select an image with extension jpg png jpeg";
                    }
                   
                }
                else{
                    echo " image not set";
                }
            }
            else{
                    echo " password does not match";
                 } 
         }
         
    

    }
    else
        {
             echo "please enter the valid e-mail";
        }   
}
else
{
    echo " Please fill all fields";
}


?>