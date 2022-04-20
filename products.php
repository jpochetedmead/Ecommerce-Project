<?php
    include 'db_connection.php';
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
        <div class="flex flex-col justify-between p-4 bg-white">
            <div class="text-sm">
                <form action="products.php" method="POST">
                    <!--Sorting-->
                    <div class="col-span-6 sm:col-span-3">
                        <button type="submit" name="filter" class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filter</button>
                        <select id="categories" name="categories" class="appearance-none rounded inline-flex justify-center block w-full px-4 py-2 border border-gray-300 placeholder-gray-500 text-center text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
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
                <?php
                $sql = '';
                if(isset($_POST['cate'])){
                    if($_POST['cate'] == 1 && strlen($_POST['item_search']) > 0){
                        $sql = "SELECT * FROM Products WHERE title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%'";
            
                    }elseif($_POST['cate'] == 1 && strlen($_POST['item_search']) == 0){
                        $sql = "SELECT * FROM Products";
                    }elseif($_POST['cate'] != 1 && strlen($_POST['item_search']) == 0){
                        $sql = "SELECT * FROM Products p INNER JOIN categories c ON p.categories = c.categories_ID
                        WHERE categories_ID = $_POST[cate]";
                    }else{
                        $sql = "SELECT * FROM Products p INNER JOIN categories c ON p.categories = c.categories_ID
                        WHERE categories_ID = $_POST[cate] AND title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%'";
                    }
                    $result = $conn->query($sql);
                    while($res = mysqli_fetch_array($result)) {
                        echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                            echo "<div class='flex justify-center'>";
                                echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                            echo "</div>";
                            echo "<div class='py-4 px-4 bg-white'>";
                                echo "<a href='product_details.php' class='text-md font-semibold text-gray-600 hover:text-blue-500'>" . $res['title'] . "</a>";
                                echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                echo "<a href='product_details.php' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</a>";
                            echo "</div>";
                        echo "</div>";
                    }
                }else{
                    $sql = "SELECT * FROM Products";
                    $result = $conn->query($sql);
                    while($res = mysqli_fetch_array($result)) {
                        echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                            echo "<div class='flex justify-center'>";
                                echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                            echo "</div>";
                            echo "<div class='py-4 px-4 bg-white'>";
                                echo "<a href='product_details.php' class='text-md font-semibold text-gray-600 hover:text-blue-500'>" . $res['title'] . "</a>";
                                echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                echo "<a href='product_details.php' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</a>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
                
                ?>

            </div>
        </div>
    </section>
</main>



<?php // TEMPLATES
include 'templates/footer.html';
?>