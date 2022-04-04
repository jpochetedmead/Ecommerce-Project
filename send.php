<?php
include 'db_connection.php';
session_start();

if(isset($_POST['send'])){
    //if based on if previous message isset
    if(isset($_POST['previousID'])){
        echo "i ran";
    $futureDate=date('Y-m-d', strtotime('+1 year'));
    $sql = "INSERT INTO Messages (sender_ID, recipient_ID,message,subject,expire_date,parent_message_ID)
    VALUES ($_SESSION[ID],$_POST[ID],'$_POST[message]','$_POST[subject]','$futureDate',$_POST[previousID]);";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }else{
    $futureDate=date('Y-m-d', strtotime('+1 year'));
    $sql = "INSERT INTO Messages (sender_ID, recipient_ID,message,subject,expire_date)
    VALUES ($_SESSION[ID],$_POST[ID],'$_POST[message]','$_POST[subject]','$futureDate');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
}
if(isset($_POST['previousID'])){
    header("location:user_messages.php");
}else{
    header("location:individualProduct.php?productID=" . $_POST['productID']);
}
?>