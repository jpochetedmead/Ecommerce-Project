<?php
    include 'db_connection.php';
?>

<?php
session_start();
if (isset($_SESSION['ID'])) {
?>

<?php // TEMPLATES
  include 'templates/head.html';
?>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
