<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<?php
// Include the database configuration file
require_once 'db_connection.php';

// If file upload form is submitted
$status = $statusMsg = '';
if(isset($_POST["submit"])){
    $status = 'error';
    if(!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png');
        if(in_array($fileType, $allowTypes)){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database
            //$sql = $conn->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())");

            // Get all the submitted data from the form
            $sql = "INSERT into images (image, created) VALUES ('$imgContent', NOW())";

            // Execute query
            mysqli_query($conn, $sql);

            if($sql){
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message
echo $statusMsg;
?>

<br>
<hr>
<br>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
<br>
<hr>
<br>

<?php // TEMPLATES
include 'templates/footer.html';
?>
