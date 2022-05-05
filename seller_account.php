<?php
include 'db_connection.php';
session_start();

//TEMPLATES
include 'templates/head.html';
include 'templates/nav-bar.php';
include 'templates/search-bar.php';
$check = 0;

$sql = "SELECT count(1) FROM products WHERE seller_ID=$_SESSION[ID]";
$result = $conn->query($sql);

$res = mysqli_fetch_array($result);
$total = $res[0];

if(isset($_POST['delete'])){
    $sql = "DELETE FROM products WHERE product_ID=$_POST[delete]";
    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
      } else {
        //echo "Error deleting record: " . $conn->error;
      }
}

if(isset($_POST['save'])){
    $price = str_replace('$', ' ', $_POST['price']);
    $listPrice = str_replace('$', ' ', $_POST['listPrice']);
    
    $sql = "UPDATE products SET price=$price, list_price=$listPrice, quantity=$_POST[quantity] WHERE product_ID=$_POST[productID]";
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
        $check = 1;

    } else {
        //echo "Error updating record: " . $conn->error;
    }

}


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
                        $counter = 0;

                        while($res = mysqli_fetch_array($result)) {

                            $sql = "SELECT * FROM transactions WHERE product_ID=$res[product_ID]";
                            $resu = $conn->query($sql);
                            $totalQuantity = 0;
                            while($use = mysqli_fetch_array($resu)) {
                                $totalQuantity = $totalQuantity + $use['product_quantity'];
                            }
                            echo "<form action='seller_account.php' method='POST' id='form" . $counter . "'>";
                            echo "<div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>";
                            echo "<div class='flex w-2/5'>"; //Product
                            echo "<div class='w-20'>";
                                echo "<img src='" . $res['image'] . "' alt='placeholder'>";
                            echo "</div>";
                            echo "<div class='flex flex-col justify-between ml-4 flex-grow'>";
                            echo "<span class='font-bold text-sm'>" . $res['title'] . "</span>";
                                echo "<span class='text-blue-500 text-xs'>" . $res['brand'] . "</span>";
                                echo "<a href='edit_listing.php?product=" . $res['product_ID'] . "' class='font-semibold text-left hover:text-red-500 text-gray-500 text-xs'>Edit</a>";
                                echo "<button form='form" . $counter . "' name='delete' type='submit' value='". $res['product_ID'] ."' class='font-semibold text-left hover:text-red-500 text-gray-500 text-xs'>Remove Item</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='flex justify-center w-1/5'>";
                                echo "<input class='mx-2 border text-center w-8' name='quantity' type='text' pattern='[0-9]+' value='" . $res['quantity'] . "'>";
                            echo "</div>";
                            echo "<input type='text' name='price' id='price' class='text-center w-1/5 font-semibold text-sm' pattern='[0-9.$]+' value='$" . sprintf("%.2f", $res['price']) . "'>";
                            echo "<input type='text' name='listPrice' id='listPrice' class='text-center w-1/5 font-semibold text-sm' pattern='[0-9.$]+' value='$" . sprintf("%.2f", $res['list_price']) . "'>";
                            echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $totalQuantity . "</span>";
                            echo "<button type='submit' form='form" . $counter . "' name='save' class='text-center w-1/5 font-semibold text-sm text-green-700'>Update</span>";
                            echo "<input type='text' hidden name='productID' id='productID' value='" . $res['product_ID'] . "'>";
                            echo "</div>";
                            echo "</form>";
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