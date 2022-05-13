<?php
session_start();
?>

<?php
// Include the database configuration file
require_once 'db_connection.php';

// If file upload form is submitted
$status = $statusMsg = '';
if(isset($_POST["submit"])){
    $status = 'error';
    if(!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','jpeg','png');
        if(in_array($fileType, $allowTypes)){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database
            //$sql = $conn->query("INSERT into images (image, create_date) VALUES ('$imgContent', NOW())");

            $product_ID = $_POST[product_ID];
            $title = $_POST[title];
            $customLabel = $_POST[customLabel];
            $price = $_POST[price];
            $list_price = $_POST[list_price];
            $brand = $_POST[brand];
            $categories = $_POST[categories];
            $productCondition = $_POST[productCondition];
            $description = $_POST[description];
            $featured = $_POST[featured]; ////
            $size = $_POST[size];
            $weight = $_POST[weight];
            $seller_ID = $_POST[seller_ID];
            $quantity = $_POST[quantity];
            $discount_percent = $_POST[discount_percent];
            $comment = $_POST[comment];

            // Get all the submitted data from the form
            //$sql = "INSERT into images (image, create_date) VALUES ('$imgContent', NOW())";
            $sql = $conn->query("INSERT into products (product_ID, title, customLabel, price, list_price, brand, categories, productCondition, description, featured, size, weight, seller_ID, quantity, discount_percent, comment, image, create_date)
            VALUES ($product_ID, '$title', '$customLabel', $price, $list_price, $brand, $categories, '$productCondition', '$description', $featured, '$size', '$weight', $seller_ID, $quantity, $discount_percent, '$comment', '$imgContent', NOW())");

            //VALUES ($product_ID, '$title', '$customLabel', $price, $list_price, $brand, $categories, '$productCondition', '$description', 0, '$size', '$weight', $seller_ID, $quantity, $discount_percent, '$comment', '$imgContent', NOW())");


            //$sql = "INSERT into products (product_ID, title, customLabel, price, list_price, brand, categories, subcategories, productCondition, description, size, weight, seller_ID, quantity, discount_percent, comment, image, create_date)
            //VALUES ($product_ID, '$title', '$customLabel', $price, $list_price, $brand, $categories, $subcategories, '$productCondition', '$description', '$size', '$weight', $seller_ID, $quantity, $discount_percent, '$comment', '$imgContent', NOW())";

            /*
            `product_ID` int(11) NOT NULL,
            `title` varchar(255) NOT NULL,
            `customLabel` varchar(255) NULL,
            `price` decimal(10,2) NOT NULL,
            `list_price` decimal(10,2) NOT NULL,
            `brand` int(11) NOT NULL,
            `categories` int(11) NOT NULL,
            `productCondition` varchar(255) NOT NULL,
            `description` text NOT NULL,
            `size` text NOT NULL,
            `weight` text NOT NULL,
            `seller_ID` int(11) NOT NULL,
            `quantity` int(8) NOT NULL,
            `discount_percent` int(3) DEFAULT NULL,
            `comment` text NOT NULL,
            `image` longblob NOT NULL,
            `create_date` datetime NOT NULL DEFAULT current_timestamp()
            */

            // Execute query
            //mysqli_query($conn, $sql);

            if($sql){
                $status = 'success';
                $statusMsg = "Item uploaded successfully.";
            }else{
                $statusMsg = "Item upload failed, please try again.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message
echo $statusMsg;
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
                    <?php
                    if($check == 1) echo "<div class='text-gray-500 text-center font-bold'>Succesfully listed your product!</div>";
                    ?>
                        <form action="seller_new_listing.php" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="px-4 py-5 sm:px-6">
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
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="catagory" class="block text-sm font-medium text-gray-700">Product Category</label>
                                            <select required id="categories" name="categories" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">>
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
                                        <!--product condition-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="productCondition" class="block text-sm font-medium text-gray-700">Condition</label>
                                            <select required type="text" id="productCondition" name="productCondition" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">>
                                              <option value="productCondition">--------------</option>
                                              <option value="New">New</option>
                                              <option value="Used">Used</option>
                                          </select>
                                        </div>
                                        <!--Product price-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input required type="text" id="price" name="price" placeholder="Price" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product discount percent-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="discount_percent" class="block text-sm font-medium text-gray-700">Discount</label>
                                            <input type="number" id="discount_percent" name="discount_percent" placeholder="Discount" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product size-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                                            <input type="text" id="size" name="size" placeholder="Size" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product weight-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                            <input type="text" id="weight" name="weight" placeholder="Weight" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <!--Product quantity-->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                            <input required type="text" id="quantity" name="quantity" placeholder="Quantity" class="appearance-none rounded relative block w-1/3 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
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

                                <!--Images File Button
                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="extraImage">Extra Images</label>
                                    <div class="col-md-4">
                                        <input id="extraImage" name="extraImage" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                -->

                                <!-- Images File Button (6 different Images)
                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700" for="extraImage">Extra Images</label>
                                    <div class="col-md-4">
                                        <input id="extraImage1" name="extraImage1" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <input id="extraImage2" name="extraImage2" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <input id="extraImage3" name="extraImage3" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <input id="extraImage4" name="extraImage4" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <input id="extraImage5" name="extraImage5" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <input id="extraImage6" name="extraImage6" type="file" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                -->
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