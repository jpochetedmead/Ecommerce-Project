<?php
include 'db_connection.php';
session_start();

$_SESSION['new'] = 1;
$_SESSION['recipient'] = 12345;
header('location:newMessage.php');

?>