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
