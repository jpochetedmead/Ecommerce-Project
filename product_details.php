<?php
include 'db_connection.php';
session_start();
$act = 0;
if(isset($_GET['recipient'])){
    $_SESSION['recipient'] = $_GET['recipient'];
    $_SESSION['new'] = 1;
    header('location:newMessage.php');
}

if(isset($_POST['cart'])){
    $quan = 1;
    $sql = "SELECT * FROM products WHERE product_ID=$_POST[product]";
    $result = $conn->query($sql);
    $les = $result->fetch_assoc();

    if($_POST['quantity'] >= 0 && $_POST['quantity'] <= $les['quantity']){
        $quan = $_POST['quantity'];
        $sql = "INSERT INTO Cart (product_ID,user_ID,quantity) VALUES($_POST[product],$_SESSION[ID],$quan)";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            $act = 3;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $act = 1;
    }

}elseif(isset($_POST['wishlist'])){
    $quan = 1;
    $sql = "SELECT * FROM products WHERE product_ID=$_POST[product]";
    $result = $conn->query($sql);
    $les = $result->fetch_assoc();

    if($_POST['quantity'] > 0 && $_POST['quantity'] <= $les['quantity']){
        $quan = $_POST['quantity'];
        $sql = "INSERT INTO Wishlist (product_ID,user_ID,quantity) VALUES($_POST[product],$_SESSION[ID],$quan)";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            $act = 2;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $act = 1;
    }}

?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>
<!-- Product page -->
<main class="flex w-full">

    <!--Display products-->
    <section class="w-full p-4">
        <div class="w-full">
            <div class="px-10 py-20 bg-white">
                <!--Distplay products below-->
                <div class="pt-6">
                    <?php
                        echo "<div class='flex justify-center'>";
                        if($act == 1){
                            echo "<P class='mb-10 font-medium text-red-500'>Please enter a valid quantity.</p>";
                        }elseif($act == 3){
                            echo "<P class='mb-10 font-medium text-blue-900'>Item(s) were added to your cart!</p>";
                        }elseif($act == 2){
                            echo "<P class='mb-10 font-medium text-blue-900'>Item(s) were added to your wishlist!</p>";
                        }
                        echo "</div>";
                    ?>
                    <!--Images-->
                        <div class="flex-shrink-0 flex justify-center">
                            <div x-data="photoGalleryApp" class="max-w-xl flex flex-col">
                                <div class="flex items-center sm:h-80">
                                    <div :class="{'cursor-not-allowed opacity-50': ! hasPrevious()}"  class="hidden sm:block cursor-pointer">
                                        <svg version="1.0" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" class="h-8" x-on:click="previousPhoto()">
                                            <path d="m42.166 55.31-24.332-25.31 24.332-25.31v50.62z" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.125"/>
                                        </svg>
                                    </div>
                                    <div class="w-full sm:w-108 flex justify-center">
                                        <img x-ref="mainImage" class="w-full sm:w-auto sm:h-80" src="" loading="lazy" />
                                    </div>
                                    <div :class="{'cursor-not-allowed opacity-50': ! hasNext()}"  class="hidden sm:block cursor-pointer">
                                        <svg version="1.0" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" class="h-8" x-on:click="nextPhoto()">
                                            <path d="m17.834 55.31 24.332-25.31-24.332-25.31v50.62z" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.125"/>
                                        </svg>
                                    </div>
                                </div>
                                <?php
                                    $sql = "SELECT * FROM products WHERE product_ID=$_POST[product]";
                                    $result = $conn->query($sql);
                                    $gran = $result->fetch_assoc();
                                ?>
                                <div class="flex justify-center mt-1 space-x-1">
                                    <img src="<?php echo $gran['image'] ?>" :class="{'ring-2 opacity-50': currentPhoto == 0}" class="h-16 w-16" x-on:click="pickPhoto(0)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/100821385/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 1}" class="h-16 w-16" x-on:click="pickPhoto(1)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/75873313/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 2}" class="h-16 w-16" x-on:click="pickPhoto(2)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/65267550/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 3}" class="h-16 w-16" x-on:click="pickPhoto(3)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/58914463/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 4}" class="h-16 w-16" x-on:click="pickPhoto(4)">
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('photoGalleryApp', () => ({
                                currentPhoto: 0,
                                photos: [
                                    "<?php echo $gran['image'] ?>",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/100821385/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/75873313/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/65267550/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/58914463/medium.jpg"
                                ],
                                init() { this.changePhoto(); },
                                nextPhoto() {
                                    if ( this.hasNext() ) {
                                        this.currentPhoto++;
                                        this.changePhoto();
                                    }
                                },
                                previousPhoto() {
                                    if ( this.hasPrevious() ) {
                                        this.currentPhoto--;
                                        this.changePhoto();
                                    }
                                },
                                changePhoto() {
                                    this.$refs.mainImage.src = this.photos[this.currentPhoto];
                                },
                                pickPhoto(index) {
                                    this.currentPhoto = index;
                                    this.changePhoto();
                                },
                                hasPrevious() {
                                    return this.currentPhoto > 0;
                                },
                                hasNext() {
                                    return this.photos.length > (this.currentPhoto + 1);
                                }
                                }))
                            })
                        </script>
                        <?php
                            $sql = "SELECT * FROM products p INNER JOIN brand b ON p.brand=b.brand_ID WHERE product_ID = $_POST[product]";
                            $result = $conn->query($sql);
                            $res = $result->fetch_assoc();
                        ?>

                    <!-- Product info -->
                    <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl"><?php echo $res['title'] ?></h1>
                        </div>

                    <!-- -->
                        <aside class="mt-4 lg:mt-0 lg:row-span-3">
                            <h2 class="text-gray-900">Price</h2>
                            <p class="text-3xl text-gray-900">$<?php echo $res['price']?></p>

                            <form action="product_details.php" method="POST" id="" class="mt-10">
                            <input type="text" name="product" hidden id="product" value='<?php echo $_POST['product'] ?>'>
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity / Available: <span><?php echo $res['quantity'] ?></span></label>
                                <input type="number" value="1" id="quantity" name="quantity" class="appearance-none rounded relative block w-1/6 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">

                                <div class="w-80 bg-white shadow-md w-fulll">
                                    <div class="flex flex-col justify-between p-4 bg-white">
                                        <div class="text-sm">
                                            <div class="border-b border-gray-200 py-6">
                                                <h3 class="-my-3 flow-root">
                                                <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                                    <?php
                                                        $sql = "SELECT * FROM Users WHERE user_ID = $res[seller_ID]";
                                                        $result = $conn->query($sql);
                                                        $sell = $result->fetch_assoc();
                                                    ?>
                                                    <p class="font-medium text-gray-700">Sold by: <?php echo $sell['first_name'] . " " . $sell['last_name'] ?></p>
                                                </div>
                                                </h3>
                                            </div>
                                            <!--Contact seller-->
                                            <div class="border-b border-gray-200 py-6">
                                                <h3 class="-my-3 flow-root">
                                                <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                                    <?php
                                                    if(isset($_SESSION['ID'])){
                                                    ?>
                                                        <a href="product_details.php?recipient=<?php echo $sell['user_ID'] ?>" class="font-medium text-blue-500 hover:text-blue-300">Contact Seller</a>
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <p><a href="login.php" class="font-medium text-blue-500 hover:text-blue-300">Sign in</a>
                                                        /<a href="register.php" class="font-medium text-blue-500 hover:text-blue-300">Sign up</a> to start adding to your cart!</p>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                </h3>
                                                <?php
                                                if(isset($_SESSION['ID'])){
                                                    ?>
                                                <!--add to cart / add to wishlist-->
                                                <div class="pt-6" id="filter-section-1">
                                                    <div class="space-y-4">
                                                        <div class="flex items-center">
                                                            <button name="cart" type="submit" class="inline-flex justify-between py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to Cart</button>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <button name="wishlist" type="submit" class="inline-flex justify-between py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to Wishlist</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!--size or whatever we want
                                            <div class="border-b border-gray-200 py-6">
                                                <h3 class="-my-3 flow-root">
                                                <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                                    <span class="font-medium text-gray-900">Size</span>
                                                </div>
                                                </h3>
                                                
                                                <div class="pt-6" id="filter-section-1">
                                                    <div class="space-y-4">
                                                        <div class="flex items-center">
                                                            <input id="filter-category-0" name="category[]" value="size-1" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600">1</label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="filter-category-0" name="category[]" value="size-1" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600">2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside>

                        <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <!-- Description and details -->
                            <div>
                            <h3 class="text-gray-900">Description</h3>

                            <div class="space-y-6">
                                <p class="text-base text-gray-600"><?php echo $res['description'] ?></p>
                            </div>
                            </div>
                            <!--Category
                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                    <span class="font-medium text-gray-900">Category</span>
                                </div>
                                </h3>
                                <div class="pt-6" id="filter-section-1">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600">Shoes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!--Brand or whatever we want-->
                            <div class="border-b border-gray-200 py-6">
                                <h3 class="-my-3 flow-root">
                                <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                    <span class="font-medium text-gray-900">Brand</span>
                                </div>
                                </h3>

                                <div class="pt-6" id="filter-section-1">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <label for="filter-category-0" class="ml-3 text-sm text-gray-600"><?php echo $res['brand'] ?></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
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