<?php
include 'db_connection.php';
session_start();
if(isset($_POST['cancel'])){
    header('location:user_messages.php');
}

if(isset($_POST['send'])){
    $sendingMessage = $_POST['oldMessage'] . '&break&' . $_SESSION['ID'] . '&break&' . $_POST['message'];
    $futureDate=date('Y-m-d', strtotime('+1 year'));

    $sql = "INSERT INTO Messages (sender_ID, recipient_ID, message, subject, parent_message_ID, expire_date)
    VALUES ($_SESSION[ID], $_POST[recipientID], '$sendingMessage', '$_POST[subject]', $_SESSION[messageID], '$futureDate')";

    
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        header('location:user_messages.php?success=1');

    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
?>