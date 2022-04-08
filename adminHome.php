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

        <div class="flex flex-col p-10">
          <div class="flex justify-between text-medium">
            <a href="buyerAccounts.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Buyer Accounts</a>
            <a href="#" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Seller Accounts</a>
            <a href="#" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Inventory</a>
          </div>
          <div class="flex justify-between text-medium">
            <a href="#" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Edit Categories</a>
            <a href="approval.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Account Approval</a>
            <a href="#" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Disabled Accounts</a>
          </div>
        </div>
