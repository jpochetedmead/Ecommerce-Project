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
                <form action="products.php" name="filter" id="sort" method="POST">
                    <!--Sorting-->
                    <div class="col-span-6 sm:col-span-3">
                        <button type="submit" name="sorting" class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filter</button>
                    </div>
                    <!--Category or whatever we want-->
                    <div class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                            <span class="font-medium text-gray-900">Additional Sorting</span>
                        </div>
                        </h3>
                        <!-- Filter section. -->
                        <div class="pt-6" id="filter-section-1">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input id="highPrice" name="price" <?php if(isset($_POST['price'])){
                                        if($_POST['price'] == 'highPrice') echo 'checked';
                                    } ?> value="highPrice" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="highPrice" class="ml-3 text-sm text-gray-600"> Highest to Lowest </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="lowPrice" name="price" <?php if(isset($_POST['price'])){
                                        if($_POST['price'] == 'lowPrice') echo 'checked';
                                    } ?> value="lowPrice" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="lowPrice" class="ml-3 text-sm text-gray-600"> Lowest to Highest </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="newArrivals" name="price" <?php if(isset($_POST['price'])){
                                        if($_POST['price'] == 'newArrivals') echo 'checked';
                                    } ?> value="newArrivals" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="newArrivals" class="ml-3 text-sm text-gray-600"> Newest Arrival </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="onSale" name="price" <?php if(isset($_POST['price'])){
                                        if($_POST['price'] == 'onSale') echo 'checked';
                                    } ?> value="onSale" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="onSale" class="ml-3 text-sm text-gray-600"> On Sale </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="popular" name="price" <?php if(isset($_POST['price'])){
                                        if($_POST['price'] == 'popular') echo 'checked';
                                    } ?> value="popular" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                    <label for="popular" class="ml-3 text-sm text-gray-600"> Most Popular </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="cate" hidden value="<?php echo (isset($_POST['cate']))? $_POST['cate']: 1 ?>">
                        <input type="text" name="item_search" hidden value="<?php echo (isset($_POST['item_search']))? $_POST['item_search']: '' ?>">
                    </div>
                </form>
            </div>
        </div>
    </aside>

    <!--Display products-->
    <section class="w-full p-4">
        <form action="product_details.php" method="POST" id="transfer">
        <div class="w-full">
            <div class="px-10 py-20 bg-white grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
                <!--Display products below-->
                <?php
                $sql = '';
                if(isset($_POST['cate']) && !isset($_POST['sorting'])){
                    if($_POST['cate'] == 1 && strlen($_POST['item_search']) > 0){
                        $sql = "SELECT * FROM Products WHERE title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%'";
            
                    }elseif($_POST['cate'] == 1 && strlen($_POST['item_search']) == 0){
                        $sql = "SELECT * FROM Products";
                    }elseif($_POST['cate'] != 1 && strlen($_POST['item_search']) == 0){
                        $sql = "SELECT * FROM Products
                        WHERE categories = $_POST[cate]";
                    }else{
                        $sql = "SELECT * FROM Products
                        WHERE categories = $_POST[cate] AND (title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%')";
                    }
                    $result = $conn->query($sql);
                    while($res = mysqli_fetch_array($result)) {
                        echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                            echo "<div class='flex justify-center'>";
                                echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                            echo "</div>";
                            echo "<div class='py-4 px-4 bg-white'>";
                            echo "<p class='text-md font-semibold text-gray-600'>" . $res['title'] . "</p>";
                            if($res['price'] != $res['list_price']){
                                    echo "<p class='mt-4 text-lg font-thin text-red-900 text-decoration-line: line-through'>$" . $res['list_price'] . "</p>";
                                }
                                echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                echo "<button form='transfer' name='product' value='" . $res['product_ID'] . "' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</button>";
                            echo "</div>";
                        echo "</div>";
                    }
                }elseif(!isset($_POST['cate']) && !isset($_POST['sorting'])){
                    $sql = "SELECT * FROM Products";
                    $result = $conn->query($sql);
                    while($res = mysqli_fetch_array($result)) {
                        echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                            echo "<div class='flex justify-center'>";
                                echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                            echo "</div>";
                            echo "<div class='py-4 px-4 bg-white'>";
                            echo "<p class='text-md font-semibold text-gray-600'>" . $res['title'] . "</p>";
                                if($res['price'] != $res['list_price']){
                                    echo "<p class='mt-4 text-lg font-thin text-red-900 text-decoration-line: line-through'>$" . $res['list_price'] . "</p>";
                                }                          
                                echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                echo "<button form='transfer' name='product' value='" . $res['product_ID'] . "' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</button>";
                            echo "</div>";
                        echo "</div>";
                    }
                }elseif(isset($_POST['cate']) && isset($_POST['sorting'])){

                    if(!isset($_POST['price'])){
                        if($_POST['cate'] == 1 && strlen($_POST['item_search']) > 0){
                            $sql = "SELECT * FROM Products WHERE title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%'";
                
                        }elseif($_POST['cate'] == 1 && strlen($_POST['item_search']) == 0){
                            $sql = "SELECT * FROM Products";
                        }elseif($_POST['cate'] != 1 && strlen($_POST['item_search']) == 0){
                            $sql = "SELECT * FROM Products p INNER JOIN categories c ON p.categories = c.categories_ID
                            WHERE categories_ID = $_POST[cate]";
                        }else{
                            $sql = "SELECT * FROM Products
                            WHERE categories_ID = $_POST[cate] AND (title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%')";
                        }
                        $result = $conn->query($sql);
                        while($res = mysqli_fetch_array($result)) {
                            echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                                echo "<div class='flex justify-center'>";
                                    echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                                echo "</div>";
                                echo "<div class='py-4 px-4 bg-white'>";
                                echo "<p class='text-md font-semibold text-gray-600'>" . $res['title'] . "</p>";
                                if($res['price'] != $res['list_price']){
                                        echo "<p class='mt-4 text-lg font-thin text-red-900 text-decoration-line: line-through'>$" . $res['list_price'] . "</p>";
                                    }                 
                                    echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                    echo "<button form='transfer' name='product' value='" . $res['product_ID'] . "' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</button>";
                                    echo "</div>";
                            echo "</div>";
                        }
                    
                    }elseif(isset($_POST['price'])){
                        if($_POST['cate'] == 1 && strlen($_POST['item_search']) > 0){
                            $sql = "SELECT * FROM Products WHERE (title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%')";
                            if($_POST['price'] == 'highPrice'){
                                $sql = $sql . ' ORDER BY price DESC';
                            }elseif($_POST['price'] == 'lowPrice'){
                                $sql = $sql . ' ORDER BY price ASC';
                            }elseif($_POST['price'] == 'newArrivals'){
                                $sql = $sql . ' ORDER BY create_date DESC';
                            }elseif($_POST['price'] == 'onSale'){
                                $sql = $sql . ' AND price != list_price';
                            }elseif($_POST['price'] == 'popular'){
                                $sql = "SELECT t.product_ID, title, price, list_price, brand, categories, image, description, seller_ID, quantity,  COUNT(*) 
                                FROM Transactions t INNER JOIN products p ON t.product_ID=p.product_ID 
                                WHERE title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%'
                                GROUP BY product_ID ORDER BY 11 DESC;";                              
                            }
                        }elseif($_POST['cate'] == 1 && strlen($_POST['item_search']) == 0){
                            $sql = "SELECT * FROM Products";
                            if($_POST['price'] == 'highPrice'){
                                $sql = $sql . ' ORDER BY price DESC';
                            }elseif($_POST['price'] == 'lowPrice'){
                                $sql = $sql . ' ORDER BY price ASC';
                            }elseif($_POST['price'] == 'newArrivals'){
                                $sql = $sql . ' ORDER BY create_date DESC';
                            }elseif($_POST['price'] == 'onSale'){
                                $sql = $sql . ' WHERE price != list_price';
                            }elseif($_POST['price'] == 'popular'){
                                $sql = "SELECT t.product_ID, title, price, list_price, brand, categories, image, description, seller_ID, quantity,  COUNT(*) 
                                FROM Transactions t INNER JOIN products p ON t.product_ID=p.product_ID 
                                GROUP BY product_ID ORDER BY 11 DESC;";                   
                            }
                        }elseif($_POST['cate'] != 1 && strlen($_POST['item_search']) == 0){
                            $sql = "SELECT * FROM Products p INNER JOIN categories c ON p.categories = c.categories_ID
                            WHERE categories_ID = $_POST[cate]";
                            if($_POST['price'] == 'highPrice'){
                                $sql = $sql . ' ORDER BY price DESC';
                            }elseif($_POST['price'] == 'lowPrice'){
                                $sql = $sql . ' ORDER BY price ASC';
                            }elseif($_POST['price'] == 'newArrivals'){
                                $sql = $sql . ' ORDER BY create_date DESC';
                            }elseif($_POST['price'] == 'onSale'){
                                $sql = $sql . ' AND price != list_price';
                            }elseif($_POST['price'] == 'popular'){
                                $sql = "SELECT t.product_ID, title, price, list_price, brand, categories, image, description, seller_ID, quantity,  COUNT(*) 
                                FROM Transactions t INNER JOIN products p ON t.product_ID=p.product_ID 
                                WHERE categories = $_POST[cate] 
                                GROUP BY product_ID ORDER BY 11 DESC;";                              
                            }
                        }else{
                            $sql = "SELECT * FROM Products p INNER JOIN categories c ON p.categories = c.categories_ID
                            WHERE categories = $_POST[cate] AND (title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%')";
                            if($_POST['price'] == 'highPrice'){
                                $sql = $sql . ' ORDER BY price DESC';
                            }elseif($_POST['price'] == 'lowPrice'){
                                $sql = $sql . ' ORDER BY price ASC';
                            }elseif($_POST['price'] == 'newArrivals'){
                                $sql = $sql . ' ORDER BY create_date DESC';
                            }elseif($_POST['price'] == 'onSale'){
                                $sql = $sql . ' AND p.price != p.list_price';
                            }elseif($_POST['price'] == 'popular'){
                                $sql = "SELECT t.product_ID, title, price, list_price, brand, categories, image, description, seller_ID, quantity,  COUNT(*) 
                                FROM Transactions t INNER JOIN products p ON t.product_ID=p.product_ID 
                                WHERE (title LIKE '%$_POST[item_search]%' OR description LIKE '%$_POST[item_search]%') AND categories = $_POST[cate]
                                GROUP BY product_ID ORDER BY 11 DESC;";                              
                            }
                        }

                        $result = $conn->query($sql);
                        while($res = mysqli_fetch_array($result)) {
                        echo "<div class='max-w-xs rounded-md overflow-hidden shadow-lg'>";
                            echo "<div class='flex justify-center'>";
                                echo "<img class='h-40' src='" . $res['image'] . "' alt='' />";
                            echo "</div>";
                            echo "<div class='py-4 px-4 bg-white'>";
                            echo "<p class='text-md font-semibold text-gray-600'>" . $res['title'] . "</p>";
                                if($res['price'] != $res['list_price']){
                                    echo "<p class='mt-4 text-lg font-thin text-red-900 text-decoration-line: line-through'>$" . $res['list_price'] . "</p>";
                                }                                    
                                echo "<p class='mt-4 text-lg font-thin'>$" . $res['price'] . "</p>";
                                echo "<button form='transfer' name='product' value='" . $res['product_ID'] . "' class='mt-4 text-lg font-thin hover:text-blue-500'>click for details</button>";
                            echo "</div>";
                        echo "</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        </form>
    </section>
</main>



<?php // TEMPLATES
include 'templates/footer.html';
?>