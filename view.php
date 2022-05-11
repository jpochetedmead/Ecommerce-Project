<?php
// Include the database configuration file
require_once 'db_connection.php';

// Get image data from database
//$result = $db->query("SELECT image FROM images ORDER BY id DESC");
$result = $conn->query("SELECT image FROM images ORDER BY id DESC");
?>

<?php if($result->num_rows > 0) { ?>
    <div class="gallery">
        <?php while($row = $result->fetch_assoc()){ ?>
            <!-- The data, charset, and base64 parameters in the src attribute below, are used to display image BLOB from our MySQL database. -->
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="194x228" />

        <?php } ?>
    </div>
<?php }
else { ?>
    <p class="status error">Image(s) not found...</p>
<?php } ?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="css/imagetest.css"/>

<div id="content">

</div>

</body>
</html>
