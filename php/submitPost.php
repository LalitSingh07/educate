<?php
include_once 'fetchuser.php';

$text = mysqli_real_escape_string($conn, $_POST['text']);

if (!empty($text)) {
    if (isset($_FILES['image'])) {
        $imageName = $_FILES['image']['name'];

        // Generate a unique name for the image
        $time = time();
        $uniqueName =  $time .  $imageName;
        $uniqueName=str_replace(' ', '', $uniqueName);
        // Directory where the images will be saved
        $uploadDirectory = '../POSTIMAGE/';

        // Path to save the image
        $targetPath = $uploadDirectory . $uniqueName;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            // Attempt insert query execution
            $sql23 = "INSERT INTO posts (uniqueId ,fname, lname, image, text, post_img) VALUES ('$unique_id ','$fname', '$lname', '$image', '$text', '$uniqueName')";
            if (mysqli_query($conn, $sql23)) {
                echo "Records added successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {

        
                // Attempt insert query execution
            $sql23 = "INSERT INTO posts (uniqueId ,fname, lname, image, text, post_img) VALUES ('$unique_id ','$fname', '$lname', '$image', '$text', '$uniqueName')";
            if (mysqli_query($conn, $sql23)) {
                echo "Records added successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

    }
} else {
    echo "Text is empty.";
}
?>
