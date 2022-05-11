<?php
    include 'db_connection.php';
    session_start();
    $productID = 0;
    if(isset($_GET['product'])){
        $productID = $_GET['product'];
    }else{
        $productID = $_POST['productID'];
    }
    $check = 0;


    if(isset($_POST['submit'])){
        $brandID = 0;
        $brand = strtoupper($_POST['brand']);
        $sql = "SELECT * FROM brand WHERE UPPER(brand)='$brand'";
        $result = $conn->query($sql);
        $rest = $result->fetch_assoc();
        if(strlen($rest['brand']) == 0){
            $sql = "INSERT INTO brand (brand) VALUES ('$_POST[brand]')";
            if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
            } else {
                //echo "Error updating record: " . $conn->error . "<br";
            }
            $sql = "SELECT * FROM brand WHERE brand='$_POST[brand]'";
            $result = $conn->query($sql);
            $bran = $result->fetch_assoc();
            $brandID = $bran['brand_ID'];
        } else{
            $brandID = $rest['brand_ID'];
        }

        $price = str_replace('$', ' ', $_POST['price']);
        $listPrice = str_replace('$', ' ', $_POST['listPrice']);

        $sql = "UPDATE products 
        SET title='$_POST[title]', brand=$brandID, quantity=$_POST[quantity], price=$price ,list_price=$listPrice, categories=$_POST[categories], description='$_POST[description]'
        WHERE product_ID=$_POST[productID]";
        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            $check = 1;
        } else {
            //echo "Error updating record: " . $conn->error;
        }
    }

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
            <?php
                if($check == 1) echo "<p class='text-green-500'>Product updated!</p>";
            ?>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Listing</h3>
                        </div>
                        <form action="edit_listing.php" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                    <?php
                                        $sql = "SELECT * FROM products INNER JOIN brand ON products.brand=brand.brand_ID WHERE products.product_ID=$productID";
                                        $result = $conn->query($sql);
                                        $res = $result->fetch_assoc();
                                    ?>
                                    <!--product Id-->
                                        <input hidden type="text" id="productID" name="productID" value="<?php echo $productID ?>">
                                        <!--Product title-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700">Product Name</label>
                                            <input required type="text" id="title" name="title" value='<?php echo $res['title'] ?>' class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product brand-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                            <input required type="text" id="brand" name="brand" value='<?php echo $res['brand'] ?>' class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product price-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input required type="text" id="price" pattern='[0-9.$]+' name="price" value='$<?php echo $res['price'] ?>' class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product list price-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="listPrice" class="block text-sm font-medium text-gray-700">List Price</label>
                                            <input required type="text" id="listPrice" pattern='[0-9.$]+' name="listPrice" value='$<?php echo $res['list_price'] ?>' class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product quantity-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                            <input required type="text" id="quantity" pattern='[0-9]+' name="quantity" value='<?php echo $res['quantity'] ?>' class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product category-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="catagory" class="block text-sm font-medium text-gray-700">Product Category</label>
                                            <select id="categories" name="categories" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">>
                                                <?php
                                                    $sql = "SELECT * FROM categories";
                                                    $resu = $conn->query($sql);
                                                    while($use = mysqli_fetch_array($resu)) {
                                                        if($use['categories_ID'] > 1){
                                                            if($res['categories'] == $use['categories_ID']){
                                                                echo "<option selected value='" . $use['categories_ID'] . "'>" . $use['categories'] . "</option>";
                                                            }else{
                                                                echo "<option value='" . $use['categories_ID'] . "'>" . $use['categories'] . "</option>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <!--Product description-->
                                        <div class="col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                                            <textarea required id="description" name="description" row="20" cols="40" wrap="soft" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"><?php echo $res['description'] ?></textarea>
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
                                    <button id="submit" name="submit" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
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