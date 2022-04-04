<?php
    include 'db_connection.php';
    session_start();
?>

<?php
$sql = "SELECT product_ID
FROM Cart";
$result = $conn->query($sql);
$productID = $result->fetch_assoc();
$id = $productID['product_ID'];
?>

<?php
$quanP = $res['quantity'];
$sql = "DELETE FROM Cart WHERE product_ID = '$id'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
  echo "Updated";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: cart.php");
?>
