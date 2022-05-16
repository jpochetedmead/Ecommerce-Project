<?php
    include 'db_connection.php';
?>

<?php
session_start();

$table = "SELECT * FROM products";
$query = mysqli_query($conn, $table);
?>

<?php
include 'templates/head.html';
include 'templates/nav-admin.php';
?>
<main class="flex w-full">
  <?php
  include 'templates/admin-side-bar.php';
  ?>
    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center justify-between pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Inventory</h2>
                            </div>
		                    <div class="flex items-center justify-between">
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
                                                Product Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Category
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Brand
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Quantity
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Size
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Date
                                            </th>
                                            </tr>
                                        </thead>
                                        <!--Table Body-->
                                        <tbody>
                                          <?php
                                          $row = mysqli_num_rows($query);
                                          if($row > 0) {
                                          while($res = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                            <!--Product name-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 overflow-wrap:break-words">
                                                <?php echo $res['title'] ?>
                                                </p>
                                            </td>
                                            <!--Description-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 overflow-wrap:break-words">
                                                <?php echo $res['description'] ?>
                                                </p>
                                            </td>
                                            <!--Category-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['categories'] ?>
                                                </p>
                                            </td>
                                            <!--Brand-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['brand'] ?>
                                                </p>
                                            </td>
                                            <!--Price-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['price'] ?>
                                                </p>
                                            </td>
                                            <!--Quantity-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['quantity'] ?>
                                                </p>
                                            </td>
                                            <!--Size-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['sizes'] ?>
                                                </p>
                                            </td>
                                            <!--Date-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $res['create_date'] ?>
                                                </p>
                                            </td>
                                            </tr>
                                            <?php
                                            }
                                          }
                                            ?>
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
