<?php
include 'db_connection.php';
session_start();

//TEMPLATES
include 'templates/head.html';
include 'templates/nav-bar.php';
include 'templates/search-bar.php';

$sql = "SELECT count(1) FROM products WHERE seller_ID=$_SESSION[ID]";
$result = $conn->query($sql);

$res = mysqli_fetch_array($result);
$total = $res[0];
    
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
                            <h1 class="font-semibold text-2xl">Inventory</h1>
                            <h2 class="font-semibold text-2xl"><?php echo $total ?> Items</h2>
                        </div>
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">List Price</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total Sold</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">  </h3>
                        </div>                            
                        <?php 

                        $sql = "SELECT * FROM products INNER JOIN brand ON products.brand=brand.brand_ID WHERE products.seller_ID=$_SESSION[ID]";
                        $result = $conn->query($sql);

                        while($res = mysqli_fetch_array($result)) {

                            $sql = "SELECT * FROM transactions WHERE product_ID=$res[product_ID]";
                            $resu = $conn->query($sql);
                            $totalQuantity = 0;
                            while($use = mysqli_fetch_array($resu)) {
                                $totalQuantity = $totalQuantity + $use['product_quantity'];
                            }

                            echo "<div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>";
                            echo "<div class='flex w-2/5'>"; //Product
                            echo "<div class='w-20'>";
                                echo "<img src='" . $res['image'] . "' alt='placeholder'>";
                            echo "</div>";
                            echo "<div class='flex flex-col justify-between ml-4 flex-grow'>";
                            echo "<span class='font-bold text-sm'>" . $res['title'] . "</span>";
                                echo "<span class='text-blue-500 text-xs'>" . $res['brand'] . "</span>";
                                echo "<button form='form1' name='delete' type='submit' value='". $res['product_ID'] ."' class='font-semibold text-left hover:text-red-500 text-gray-500 text-xs'>Remove</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='flex justify-center w-1/5'>";
                                echo "<button form='form1' name='minus' type='submit' value='". $res['product_ID'] ."'>-</button>";

                                echo "<input class='mx-2 border text-center w-8' disabled type='text' value='" . $res['quantity'] . "'>";

                                echo "<button form='form1' name='plus' type='submit' value='". $res['product_ID'] ."'>+</button>";
                            echo "</div>";
                            echo "<span class='text-center w-1/5 font-semibold text-sm'>$" . sprintf("%.2f", $res['price']) . "</span>";
                            echo "<span class='text-center w-1/5 font-semibold text-sm'>$" . sprintf("%.2f", $res['list_price']) . "</span>";
                            echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $totalQuantity . "</span>";
                            echo "<button type='submit' class='text-center w-1/5 font-semibold text-sm text-green-700'>Save</span>";
                            echo "</div>";
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php // TEMPLATES
include 'templates/footer.html';
?>