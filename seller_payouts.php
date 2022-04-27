<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
include 'templates/head.html';
include 'templates/nav-bar.php';
include 'templates/search-bar.php';
?>
<main class="flex w-full">
  <?php
  include 'templates/seller-side-bar.php';
  ?>
    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Payouts and Transactions</h2>
                            </div>
                        </div>

                        <!--Table-->
                        <div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <!--Table Header-->
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Order Number
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Payout
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            </tr>
                                        </thead>
                                        <!--Table Body-->
                                        <tbody>
                                            <tr>
                                            <!--Order number-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="order.php" class="text-blue-500 hover:text-blue-300 whitespace-no-wrap">
                                                Random text:
                                                </a>
                                            </td>
                                            <!--Name-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text:
                                                </p>
                                            </td>
                                            <!--Payout-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                $400
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white flex justify-evenly">
                                                <div class="flex items-center">
                                                    <input name="shipped[]" value="shipped" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="shipped" class="ml-3 text-sm text-gray-600">Shipped</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input name="processing[]" value="processing" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="processing" class="ml-3 text-sm text-gray-600">Processing</label>
                                                </div>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!------>
	                </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'templates/footer.html';
?>