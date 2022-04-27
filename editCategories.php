<?php
    include 'db_connection.php';

    if(isset($_GET['categories'])) {
      $cName = $_GET['categories'];
      $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE `categories` = '$cName'");
      header("location:editCategories.php");
    }

    $table = "select * from categories";
    $query = mysqli_query($conn, $table);
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
                    <a href="sellerAccounts.php">Seller Accounts</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="inventory.php">Inventory</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="editCategories.php">Edit Categories</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="approval.php">Account Approval</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="disabledAccounts.php">Disabled Accounts</a>
                </div>
            </div>
        </div>
    </aside>

<!--Merge-->
    <?php
    if(isset($_POST['add'])) {
      $sql = "INSERT INTO categories (categories) VALUES ('$_POST[cat]')";
      if ($conn->query($sql) === TRUE) {
        //echo "Updated";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
      header("location:editCategories.php");
    }
    ?>

    <form action="editCategories.php" method="POST">
      <button type="submit" name="edit" id="edit">Edit</button>
      <?php
      if(isset($_POST['edit'])) {
      ?>
    </form>


    <form action="editCategories.php" method="POST">
      <input type="text" name="cat" id="cat" placeholder="Add Categories">
      <button type="submit" name="add" id="add" value="add">Add New</button>

        <table>
          <tr>
            <th>Category</th>
            <th>Remove</th>
          </tr>


          <?php
          $row = mysqli_num_rows($query);
          if($row > 0) {
            while($res = mysqli_fetch_array($query)) {
              echo "<tr>
                <td>".$res['categories']."</td>
                <td><a href='editCategories.php?categories=".$res['categories']."'>Delete</a></td>
              </tr>";
            }
          }
          ?>
        </table>
        </form>
      <?php
}
      ?>
