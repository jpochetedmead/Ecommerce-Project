<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <!-- CSS -->
  <link rel="stylesheet" href="css/contact.css">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet"/>

  <title>BuyMerca - Contact Us</title>
</head>
<body class="h-full">

  <?php
  //TEMPLATES
      //include 'templates/head.html';
      include 'templates/nav-bar.php';
      //include 'templates/search-bar.html';
  ?>

<div class="container contact-form">

            <div class="contact-image-form">
                <img src="images/contact-us.jpeg" alt="dice_contact"/>
            </div>

            <fieldset>
            <form name="Contact" class="needs-validation" method="POST" action="contact-page.php">

              <div class="py-5 text-center">
                <h3 class="h1">Contact Us</h3>
                <p class="lead">BuyMerca wants to hear from you...</p>
                <hr class="mb-1">
              </div>

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fName" id="fName" placeholder="Your First Name *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lName" id="lName" placeholder="Your Last Name *" value="" required />
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email *" required />
                          <div class="invalid-feedback">A valid email is required.</div>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="telephoneNumber" id="telephoneNumber" placeholder="Your Phone #: 123-456-7890 *" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                            <div class="invalid-feedback">Format: 123-456-7890</div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" id="btnSubmit" class="btnContact" value="Send Message" />
                            <input type="reset" name="btnReset" id="btnReset" class="btnResetContact" value="Reset" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="Message" id="Message" placeholder="Your Message *" maxlength="300" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
            </fieldset>
</div>

<?php
if (isset($_POST['Email'])) {

    // The email destination + the Subject of the email.
    $email_to = "jpe3841@gmail.com";
    $email_subject = "BuyMerca - Contact Us Submission";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation for the expected data
    if (
        !isset($_POST['fName']) ||
        !isset($_POST['lName']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['telephoneNumber']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $fName = $_POST['fName']; // required
    $lName = $_POST['lName']; // required
    $telephoneNumber = $_POST['telephoneNumber']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $fName)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br>';
    }

    if (!preg_match($string_exp, $lName)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "BuyMerca's Contact Form details below:\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($fName) . " " . clean_string($lName) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Phone #: " . clean_string($telephoneNumber) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- Success Message -->
    <p class="alert alert-success mt-5 mb-5 text-center">Thank you for contacting BuyMerca. We will be in touch with you as soon as possible.</p>

<?php
}
?>


<?php
/* BELOW IM WORKING ON A WAY TO SEND THE DATA TO OUR OWN DATABASE INSTEAD OF SENDING IT TO OUR EMAIL */
/*
include 'db_connection.php';
// database connection code
if (isset($_POST['Email'])) {

// get the post records
$fName = $_POST['fName']; // required
$lName = $_POST['lName']; // required
$email = $_POST['Email']; // required
$telephoneNumber = $_POST['telephoneNumber']; // required
$message = $_POST['Message']; // required

// database insert SQL code
$sql = "INSERT INTO 'Contact' ('id', 'fName', 'lName', 'Email', 'telephoneNumber', 'Message')
VALUES ('0', '$fName', '$lName', '$email', '$telephoneNumber', '$message')";


// insert in database

/*
$rs = mysqli_query($conn, $sql);
if($rs) {
echo "Contact Records Inserted";
} else {
echo "SOMETHING IS WRONG!";
}
*/

/*
if ($conn->query($sql) === TRUE) {
echo Record updated successfully;
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
?>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
