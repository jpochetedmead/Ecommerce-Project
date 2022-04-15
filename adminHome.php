<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
include 'templates/head.html';
include 'templates/nav-admin.php';
?>

  <main class="h-full w-full">
    <section class="w-full p-4">
      <div class="w-full text-md">
        <div class='bg-white shadow sm:rounded'>
          <div class="flex justify-around w-full p-10">
            <div class="flex flex-col w-1/6 text-medium">
              <a href="buyerAccounts.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Buyer Accounts</a>
              <a href="sellerAccounts.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Seller Accounts</a>
              <a href="inventory.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Inventory</a>
            </div>
            <div class="flex flex-col w-1/6 text-medium">
              <a href="editCategories.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Edit Categories</a>
              <a href="approval.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Account Approval</a>
              <a href="disabledAccounts.php" class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700">Disabled Accounts</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php
include 'templates/footer.html';
?>