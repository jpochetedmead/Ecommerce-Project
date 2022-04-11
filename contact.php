<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<div class="w-full">
    <div class="flex shadow-md my-10">
        <div class="w-full bg-white px-10 py-10">
            <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>

                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        <div class="container">
                            <div class="">
                                <img class="w-20 rounded-full" src="images/contact-us.jpeg" alt="dice_contact"/>
                            </div>
                        </div>
                        Contact Us
                        </h2>
                        <p class="mt-6 text-center text-gray-900">BuyMerca wants to hear from you...</p>
                    </div>
                    <div class="mt-10 sm:mt-0">
                        <div class="w-full">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="contact.php" method="POST">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fname" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input id="fname" name="fname" type="text" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="lname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input id="lname" name="lname" type="text" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                                <input id="email" name="email" required type="email" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                <input id="phone" name="phone" required type="tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                            <div class="mt-1">
                                                <textarea required id="message" name="Message" row="20" cols="40" wrap="soft" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Send a brief message."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                        <div class="flex justify-around w-full pt-12">
                                            <input value='Reset' name='btnReset' type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <input value='Send' name='btnSubmit' type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
