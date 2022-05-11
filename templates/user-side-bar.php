<!--user side bar-->
<?php
    session_start();
?>
<aside class="w-80 bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-5 rounded"><?php echo strtoupper($_SESSION['firstName']) . " " . strtoupper($_SESSION['lastName']) ?></div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_account.php">Personal Info</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_wishlist.php">Wishlist</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_order_history.php">Order History</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_messages.php">Messages</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_shipping.php">Change Shipping</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_password.php">Change Password</a>
                </div>
                <!--not ready for this
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_payment.php">Change Payment</a>
                </div>
                -->
                <?php
                    if($_SESSION['role'] == 'seller'){
                        echo "<div class='bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300'>";
                            echo "<a href='seller_account.php'>Seller account</a>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </aside>