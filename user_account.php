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

<main class="flex w-full h-screen">
    <aside class="w-80 h-screen bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-5 rounded">User Name</div>
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
                    <a href="user_change_shipping.php">Change Shipping</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_payment.php">Change Payment</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_password.php">Change Password</a>
                </div>
            </div>
        </div>
    </aside>

    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Full name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">account user name</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Shipping address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">1234 Shipping Address St, Lancaster, PA 17602</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">example@example.com</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">123-456-7890</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Example</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Example</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Example</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Example</dd>
                    </div>
                    </dl>
                </div>
            </div>

        </div>
    </section>

</main>

<?php // TEMPLATES
include 'templates/footer.html';
?>