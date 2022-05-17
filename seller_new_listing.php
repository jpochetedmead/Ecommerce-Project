<?php
session_start();
include 'db_connection.php';
$check = 0;
$brandID = 0;
if(isset($_POST["list"])){
    $brand = strtolower($_POST['brand']);
    $sql = "SELECT * FROM brand WHERE LOWER(brand)='$brand'";
    $result = $conn->query($sql);
    $use = $result->fetch_assoc();
    if(strlen($use['brand']) > 0){
        $brandID = $use['brand_ID'];
    }else{
        $sql = "INSERT INTO brand (brand) VALUES('$_POST[brand]')";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql = "SELECT * FROM brand WHERE brand = '$_POST[brand]'";
        $result2 = $conn->query($sql);
        $use2 = $result2->fetch_assoc();
        $brandID = $use2['brand_ID'];
    }
    $price = str_replace('$', ' ', $_POST['price']);

    $sql = "INSERT INTO products (title, price, list_price, brand, categories, description, seller_ID, quantity)
    VALUES('$_POST[title]', $price, $price, $brandID, $_POST[categories], '$_POST[description]', $_SESSION[ID], $_POST[quantity])";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        $check = 1;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
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
                        <form action="seller_new_listing.php" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="px-4 py-5 sm:px-6">
                                    <?php
                                        if($check == 1) echo "<p class='text-green-500'>New product listed!</p>";
                                    ?>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">List a new Product</h3>
                                    </div>
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
                                        <!--Product category-->
                                        <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = $conn->query($sql);
                                        ?>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="catagory" class="block text-sm font-medium text-gray-700">Product Category</label>
                                            <select required id="categories" name="categories" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            <?php
                                            $timer = 1;
                                            while($res = mysqli_fetch_array($result)) {
                                                if($timer != 1){
                                            ?>
                                            <option value="<?php echo $res['categories_ID'] ?>"><?php echo $res['categories'] ?></option>
                                             <?php
                                                }
                                                $timer++;
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <!--Product price-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input required type="text" pattern='[0-9.$]+' id="price" name="price" placeholder="$100.00" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product quantity-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                            <input required type="number" id="quantity" name="quantity" placeholder="Quantity" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product description-->
                                        <div class="col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                                            <textarea required id="description" name="description" row="20" cols="40" wrap="soft" placeholder="Product Description" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <!-- File Button
                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="image">Main Image</label>
                                    <div class="col-md-4">
                                        <input id="image" name="image" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                -->
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button id="list" name="list" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">List</button>
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
