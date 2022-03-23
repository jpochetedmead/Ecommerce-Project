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
  include 'templates/mainMenu.html';
?>
<?php // TEMPLATES
  include 'templates/sideMenu.html';
?>

<h1>Testing the page</h1>
<p>aaaeeeiiooouuu</p>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
