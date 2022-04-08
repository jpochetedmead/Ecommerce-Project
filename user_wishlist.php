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

    $totalQuantity = 0;
    $sql="SELECT * FROM Wishlist WHERE user_ID=$_SESSION[ID]";
    $result = $conn->query($sql);
    while($res = mysqli_fetch_array($result)) {
        $totalQuantity += $res['quantity'];
    }


    if(isset($_POST['delete'])){
        $sql = "DELETE FROM Wishlist WHERE product_ID=$_POST[delete]";
        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
        } else {
            //echo "Error deleting record: " . $conn->error;
        }
    }
    if(isset($_POST['minus'])){
        $sql = "SELECT * FROM Wishlist WHERE product_ID=$_POST[minus]";
        $result = $conn->query($sql);
        $minus = $result->fetch_assoc();
        
        $quan = $minus['quantity'] - 1;
        if($quan > 0){
            $sql = "UPDATE Wishlist SET quantity=$quan WHERE product_ID=$_POST[minus] && user_ID=$_SESSION[ID]";
            if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            }else{
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    if(isset($_POST['plus'])){
        $sql = "SELECT * FROM Wishlist WHERE product_ID=$_POST[plus]";
        $result = $conn->query($sql);
        $minus = $result->fetch_assoc();
        
        $sql = "SELECT * FROM products WHERE product_ID=$_POST[plus]";
        $result = $conn->query($sql);
        $check = $result->fetch_assoc();
        
        $quan = $minus['quantity'] + 1;
        if($quan <= $check['quantity']){
            $sql = "UPDATE Wishlist SET quantity=$quan WHERE product_ID=$_POST[plus] && user_ID=$_SESSION[ID]";
            if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            }else{
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    if(isset($_POST['move'])){
        $info = explode(" ", $_POST['move']);
        $product_ID = $info[0];
        $quantity = $info[1];
        $sql = "DELETE FROM Wishlist WHERE product_ID=$product_ID";
        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
        } else {
            //echo "Error deleting record: " . $conn->error;
        }

        $sql = "INSERT INTO Cart (product_ID,user_ID,quantity)
        VALUES ($product_ID,$_SESSION[ID],$quantity)";
        if ($conn->query($sql) === TRUE) {
            //"echo New record created successfully";
        } else {
            //"echo Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<main class="flex w-full h-screen">
    <aside class="w-80 h-screen bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-5 rounded"><?php echo strtoupper($_SESSION['firstName']) . " " . strtoupper($_SESSION['lastName']) ?></div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_account.php">Personal Info</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_wishlist.php">Wishlist</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_order_history.php">Order History</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_messages.php">Messages</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_shipping.php">Change Shipping</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_payment.php">Change Payment</a>
                </div>
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="user_change_password.php">Change Password</a>
                </div>
            </div>
        </div>
    </aside>
    <form action="user_wishlist.php" method="POST" id="form2" class="w-full p-4">
        <div class="w-full text-md">
            <div class="container mx-auto mt-10">
                <div class="flex shadow-md my-10">
                    <div class="w-full bg-white px-10 py-10">
                        <div class="flex justify-between border-b pb-8">
                            <h1 class="font-semibold text-2xl">Wishlist</h1>
                            <h2 class="font-semibold text-2xl"> <?php echo $totalQuantity?> Items</h2>
                        </div>
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                        </div>
                        <?php
                        $totalPrice = 0;
                    $sql="SELECT * FROM Wishlist WHERE user_ID=$_SESSION[ID]";
                    $result = $conn->query($sql);

                    while($res = mysqli_fetch_array($result)) {
                    $sql = "SELECT * FROM products INNER JOIN brand ON products.brand=brand.brand_ID WHERE products.product_ID=$res[product_ID]";
                    $product = $conn->query($sql);
                    $thing = $product->fetch_assoc();
                    $totalPrice += ($thing['price'] * $res['quantity']);

                    echo "<div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>";
                        echo "<div class='flex w-2/5'>"; //Product
                            echo "<div class='w-20'>";
                                echo "<img src='" . $thing['image'] . "' alt='placeholder'>";
                            echo "</div>";
                            echo "<div class='flex flex-col justify-between ml-4 flex-grow'>";
                                echo "<span class='font-bold text-sm'>" . $thing['title'] . "</span>";
                                echo "<span class='text-blue-500 text-xs'>" . $thing['brand'] . "</span>";
                                echo "<button form='form2' name='delete' type='submit' value='". $thing['product_ID'] ."' class='font-semibold hover:text-red-500 text-gray-500 text-xs'>Remove</button>";
                                echo "<button form='form2' name='move' type='submit' value='". $thing['product_ID'] . " " . $res['quantity']."' class='font-semibold hover:text-red-500 text-gray-500 text-xs'>Move To Cart</button>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='flex justify-center w-1/5'>";
                            echo "<button form='form2' name='minus' type='submit' value='". $thing['product_ID'] ."'>-</button>";

                            echo "<input class='mx-2 border text-center w-8' disabled type='text' value='" . $res['quantity'] . "'>";

                            echo "<button form='form2' name='plus' type='submit' value='". $thing['product_ID'] ."'>+</button>";
                        echo "</div>";
                        echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $thing['price'] . "</span>";
                        echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $thing['price'] * $res['quantity'] . "</span>";
                    echo "</div>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </form>

</main>

<?php // TEMPLATES
include 'templates/footer.html';
?>