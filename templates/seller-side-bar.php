<?php
    session_start();
?>

<!--seller side bar-->
<aside class="w-80 bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-5 rounded"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="seller_account.php">Inventory</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="seller_sold.php">Sold</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="seller_payouts.php">Payouts</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="seller_new_listing.php">List new item</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_account.php">Account</a>
                </div>

            </div>
        </div>
    </aside>