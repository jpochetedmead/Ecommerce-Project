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

<?php
$sql = "SELECT question
FROM FAQ";
$result = $conn->query($sql);
$ques = $result->fetch_assoc();
$q = $ques['question'];
?>

<?php
$sql = "SELECT answer
FROM FAQ";
$result = $conn->query($sql);
$ans = $result->fetch_assoc();
$a = $ans['answer'];
?>

<table>
  <tr>
    <th>Question</th>
    <th>Answer</th>
  </tr>

  <?php
      echo "<tr>";
      echo "<td>".$q."</td>";
      echo "<td>".$a."</td>";
  ?>

  <?php
  $sql = "SELECT *
  FROM FAQ";
  $result = $conn->query($sql);
  $res = $result->fetch_assoc();
  ?>

<?php
while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['question']."</td>";
    echo "<td>".$res['answer']."</td>";
  }
?>
</table>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
