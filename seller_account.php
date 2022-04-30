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

<main class="flex w-full">
    <?php
    //TEMPLATES
        include 'templates/seller-side-bar.php';
    ?>

    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="container mx-auto mt-10">
                <div class="flex shadow-md my-10">
                    <div class="w-full bg-white px-10 py-10">
                        <div class="flex justify-between border-b pb-8">
                            <h1 class="font-semibold text-2xl">Selling</h1>
                            <h2 class="font-semibold text-2xl">1 Items</h2>
                        </div>
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                        </div>
                        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5"> <!-- product -->
                                <div class="w-20">
                                    <img src="https://via.placeholder.com/150" alt="placeholder">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">Product 1</span>
                                    <span class="text-blue-500 text-xs">Brand</span>
                                    <a href="edit_listing.php" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Edit</a>
                                    <button form='form1' name='delete' type='submit' class='font-semibold hover:text-red-500 text-left text-gray-500 text-xs'>Remove</button>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                            <span class="text-center w-1/5 font-semibold text-sm">1</span>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                            <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php // TEMPLATES
include 'templates/footer.html';
?>