<?php
include 'db_connection.php';
session_start();
if(isset($_POST['cancel'])){
    header('location:user_messages.php');
}

if(isset($_POST['send'])){
    $sendingMessage = $_POST['oldMessage'] . '&break&' . $_SESSION['ID'] . '&break&' . $_POST['message'];
    echo $sendingMessage . "<br>";
    echo $_POST['recipientID'];
}
?>