<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
/* To show the list a product data in another page...
$sql = "SELECT id, yourname, email, phone, sponsorname, sponsorshiplevel, logofile FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. "<br>". " Name: " . $row["yourname"]. "<br>". "  Email: " . $row["email"]. "<br>". " Phone: " . $row["phone"]. "<br>". "Sponsor Name: " . $row["sponsorname"]. "<br>". "Sponsorship Level: " . $row["sponsorshiplevel"]. "<br>". "<hr>";
}
} else {
  echo "0 results";
}
$conn->close();
*/

?>
