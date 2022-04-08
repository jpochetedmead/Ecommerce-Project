<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
include 'templates/head.html';
?>

<nav class="bg-blue-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <h1 class="text-white">Ecommerce Project</h1>
        <div>
          <div class="ml-10 flex items-baseline space-x-4">

            <a href="adminHome.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
          </div>
        </div>
      </div>

      <div>
        <?php
        if (isset($_SESSION['ID'])) {
        ?>
        <a href="logout.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
        <?php
      }
        ?>
      </div>
    </div>
  </div>
</nav>

<main class="flex w-full h-screen">
    <aside class="w-80 h-screen bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="buyerAccounts.php">Buyer Accounts</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="#">Seller Accounts</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="#">Inventory</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="#">Edit Categories</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="approval.php">Account Approval</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="#">Disabled Accounts</a>
                </div>
            </div>
        </div>
    </aside>

    <form action="buyerAccounts.php" method="POST">
      <input type="submit" value="View All" name="search">
    </form>

  <?php
  if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql = "SELECT first_name, last_name, email, user_ID, telephone_number
    FROM Users
    WHERE role = 'buyer'";

    $sql = "SELECT first_name, last_name
    FROM Users";
    $result = $conn->query($sql);
    $userN = $result->fetch_assoc();
    $usersFullName = $userN['first_name'] . " " . $userN['last_name'];

    $sql = "SELECT email
    FROM Users";
    $result = $conn->query($sql);
    $userE = $result->fetch_assoc();
    $usersEmail = $userE['email'];

    $sql = "SELECT user_ID
    FROM Users";
    $result = $conn->query($sql);
    $userID = $result->fetch_assoc();
    $usersId = $userID['user_ID'];

    $sql = "SELECT telephone_number
    FROM Users";
    $result = $conn->query($sql);
    $userP = $result->fetch_assoc();
    $usersPhone = $userP['telephone_number'];
  ?>

  <table>
  <tr>
    <th>Users Name</th>
    <th>Users Email</th>
    <th>Users ID</th>
    <th>Users Phone Number</th>
  </tr>

<form method="post" action="buyerAccounts.php">
<?php
    while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$userN['first_name']. " " .$userN['last_name']."</td>";
    echo "<td>".$userE['email']. "</td>";
    echo "<td>".$userID['user_ID']. "</td>";
    echo "<td>".$userP['telephone_number']. "</td>";
  }
}
?>
</form>
</table>
