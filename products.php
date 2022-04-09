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
<!-- Product page -->
<main class="flex w-full">
    <!--Product filering -->
    <aside class="w-80 bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <form action="" method="POST">
                    <!--Sorting-->
                    <div class="col-span-6 sm:col-span-3">
                        <label for="catagory" class="block text-sm font-medium text-gray-700">Sort</label>
                        <select id="categories" name="categories" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">>
                            <option value="Best Match">Best Match</option>
                            <option value="Lowest">Lowest Price</option>
                            <option value="Highest">Highest Price</option>
                            <option value="Newes">Newest Listing</option>
                            <option value="Oldes">Oldest Listing</option>
                        </select>
                    </div>
                    <!--Category or whatever we want-->
                    <div class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                            <span class="font-medium text-gray-900">Category</span>
                        </div>
                        </h3>
                        <!-- Filter section. -->
                        <div class="pt-6" id="filter-section-1">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New Arrivals </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600"> Organization </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Brand or whatever we want-->
                    <div class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                            <span class="font-medium text-gray-900">Brand</span>
                        </div>
                        </h3>
                        <!-- Filter section. -->
                        <div class="pt-6" id="filter-section-1">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New Arrivals </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600"> Organization </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Keyword or whatever we want-->
                    <div class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                            <span class="font-medium text-gray-900">Keyword</span>
                        </div>
                        </h3>
                        <!-- Filter section. -->
                        <div class="pt-6" id="filter-section-1">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New Arrivals </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600"> Organization </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                </form>
            </div>
        </div>
    </aside>

    <!--Display products-->
    <section class="w-full p-4">
        <div class="w-full">
            <div class="px-10 py-20 bg-white grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
                <!--Distplay products below-->

                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://www.apple.com/newsroom/images/product/mac/standard/Apple_MacBook-Pro_16-inch-Screen_10182021_big_carousel.jpg.large.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>

                <!--More product examples can be deleted-->
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://media.cnn.com/api/v1/images/stellar/prod/201116214440-9-macbook-air-review-silicon-underscoredjpg.jpg?q=w_2615,h_1556,x_0,y_0,c_fill" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://www.macworld.com/wp-content/uploads/2022/01/macbook-pro-compare.jpg?quality=50&strip=all&w=1024" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://img.republicworld.com/republic-prod/stories/promolarge/xhdpi/g1jzwrwrlfim5wux_1623141909.jpeg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://cdn.mos.cms.futurecdn.net/GfinEMFXnT42BFxAcDc2rA.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://images.indianexpress.com/2021/12/macbook-pro-2021-review-featured-image.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>

                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://www.apple.com/newsroom/images/product/mac/standard/Apple_MacBook-Pro_16-inch-Screen_10182021_big_carousel.jpg.large.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://media.cnn.com/api/v1/images/stellar/prod/201116214440-9-macbook-air-review-silicon-underscoredjpg.jpg?q=w_2615,h_1556,x_0,y_0,c_fill" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://www.macworld.com/wp-content/uploads/2022/01/macbook-pro-compare.jpg?quality=50&strip=all&w=1024" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://img.republicworld.com/republic-prod/stories/promolarge/xhdpi/g1jzwrwrlfim5wux_1623141909.jpeg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://cdn.mos.cms.futurecdn.net/GfinEMFXnT42BFxAcDc2rA.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <div class="max-w-xs rounded-md overflow-hidden shadow-lg">
                    <div class="flex justify-center">
                        <img class="h-40" src="https://images.indianexpress.com/2021/12/macbook-pro-2021-review-featured-image.jpg" alt="" />
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <a href="#" class="text-md font-semibold text-gray-600 hover:text-blue-500">Apple MacBook Pro M1 13.3&quot; Silver 16GB/512GB (MYDC2FN/A-16GB)</a>
                        <p class="mt-4 text-lg font-thin">$ 2400</p>
                        <span class="flex items-center justify-center mt-4 w-full bg-gray-900 hover:bg-gray-700 py-1 rounded">
                        <button class="font-semibold text-white">Add to Cart</button>
                        </span>
                    </div>
                </div>
                <!--examples ends-->

            </div>
        </div>
    </section>
</main>



<?php // TEMPLATES
include 'templates/footer.html';
?>