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
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!--Product title-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">Product Name</label>
                                            <input required type="text" id="title" name="title" placeholder="Product name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product brand-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                            <input required type="text" id="brand" name="brand" placeholder="Brand" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product price-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input required type="text" id="price" name="price" placeholder="Price" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product size-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                                            <input type="text" id="size" name="size" placeholder="Size" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product quantity-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                            <input required type="text" id="quantity" name="quantity" placeholder="Quantity" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product category-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="catagory" class="block text-sm font-medium text-gray-700">Product Category</label>
                                            <select id="categories" name="categories" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">>
                                                <option value="Category">------------------</option>
                                                <option value="Clothing">Clothing</option>
                                                <option value="Shoes">Shoes</option>
                                                <option value="Fine Art">Fine Art</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Handbags">Handbags</option>
                                                <option value="Sunglasses">Sunglasses</option>
                                                <option value="Books">Books</option>
                                            </select>
                                        </div>
                                        <!--listing date-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="create_date" class="block text-sm font-medium text-gray-700">Listing Date</label>
                                            <input required type="date" id="create_date" name="create_date" placeholder="Listing Date" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product description-->
                                        <div class="col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                                            <textarea required id="description" name="description" row="20" cols="40" wrap="soft" placeholder="Product Description" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        </div>

                                    </div>
                                </div>
                                 <!-- File Button -->
                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="image">Main Image</label>
                                    <div class="col-md-4">
                                        <input id="image" name="image" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                <!-- File Button -->
                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="extraImage">Extra Images</label>
                                    <div class="col-md-4">
                                        <input id="extraImage" name="extraImage" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button id="publish_Item" name="publish_Item" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">List</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php // TEMPLATES
include 'templates/footer.html';
?>