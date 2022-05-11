<?php
    include 'db_connection.php';
    session_start();

//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';



    if(isset($_POST['delete'])){
        $sql = "DELETE FROM Cart WHERE product_ID=$_POST[delete]";
        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
        } else {
            //echo "Error deleting record: " . $conn->error;
        }
    }
    if(isset($_POST['minus'])){
        $sql = "SELECT * FROM Cart WHERE product_ID=$_POST[minus]";
        $result = $conn->query($sql);
        $minus = $result->fetch_assoc();

        $quan = $minus['quantity'] - 1;
        if($quan > 0){
            $sql = "UPDATE Cart SET quantity=$quan WHERE product_ID=$_POST[minus] && user_ID=$_SESSION[ID]";
            if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            }else{
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    if(isset($_POST['plus'])){
        $sql = "SELECT * FROM Cart WHERE product_ID=$_POST[plus]";
        $result = $conn->query($sql);
        $minus = $result->fetch_assoc();

        $sql = "SELECT * FROM products WHERE product_ID=$_POST[plus]";
        $result = $conn->query($sql);
        $check = $result->fetch_assoc();

        $quan = $minus['quantity'] + 1;
        if($quan <= $check['quantity']){
            $sql = "UPDATE Cart SET quantity=$quan WHERE product_ID=$_POST[plus] && user_ID=$_SESSION[ID]";
            if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
            }else{
            //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $totalQuantity = 0;
    $sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
    $result = $conn->query($sql);
    while($res = mysqli_fetch_array($result)) {
        $totalQuantity += $res['quantity'];
    }


?>

<main class="flex w-full">
<section class="w-full p-4">
    <form action="checkout.php" method="post" id="form1">
        <div class="w-full text-md">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Cash Payments Only!!</h1>
                </div>
                <div>
                    <div class="flex shadow-md my-10">
                        <div class="w-3/4 bg-white px-10 py-10">
                            <div class="flex justify-between border-b pb-8">
                                <h1 class="font-semibold">Shopping Cart</h1>
                                <h2 class="font-semibold"><?php echo $totalQuantity ?> Items</h2>
                            </div>
                            <div class="flex mt-10 mb-5">
                                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                            </div>
                            <?php
                            $sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
                            $result = $conn->query($sql);
                            while($res = mysqli_fetch_array($result)) {
                                $sql = "SELECT * FROM products INNER JOIN brand ON products.brand=brand.brand_ID WHERE products.product_ID=$res[product_ID]";
                                $product = $conn->query($sql);
                                $thing = $product->fetch_assoc();
                                $totalPrice += ($thing['price'] * $res['quantity']);
                                echo "<div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>";
                                    echo "<div class='flex w-2/5'>";
                                        echo "<div class='w-20'>";
                                            echo "<img src='" . $thing['image'] . "'alt='placeholder'>";
                                        echo "</div>";
                                        echo "<div class='flex flex-col justify-between ml-4 flex-grow'>";
                                            echo "<span class='font-bold text-sm'>" . $thing['title'] . "</span>";
                                            echo "<span class='text-blue-500 text-xs'>" . $thing['brand'] . "</span>";
                                            echo "<button form='form1' name='delete' type='submit' value='". $thing['product_ID'] ."' class='font-semibold text-left hover:text-red-500 text-gray-500 text-xs'>Remove</button>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='flex justify-center w-1/5'>";
                                        echo "<button form='form1' name='minus' type='submit' value='". $thing['product_ID'] ."'>-</button>";

                                        echo "<input class='mx-2 border text-center w-8' disabled type='text' value='" . $res['quantity'] . "'>";

                                        echo "<button form='form1' name='plus' type='submit' value='". $thing['product_ID'] ."'>+</button>";
                                    echo "</div>";
                                    echo "<span class='text-center w-1/5 font-semibold text-sm'>" . sprintf("%.2f", $thing['price']) . "</span>";
                                    echo "<span class='text-center w-1/5 font-semibold text-sm'>" . sprintf("%.2f", ($thing['price'] * $res['quantity']))  . "</span>";
                                echo "</div>";
                            }
                            ?>

                        </div>

                        <div id="summary" class="w-1/4 px-8 py-10">
                            <h1 class="font-semibold border-b pb-8">Order Summary</h1>
                            <div class="flex justify-between mt-10 mb-5">
                                <span class="font-semibold text-sm">Items</span>
                                <span class="font-semibold text-sm"><?php echo $totalQuantity ?></span>
                            </div>
                            <div class="border-t mt-8">
                                <div class="flex font-semibold justify-between py-6 text-sm">
                                    <span>Total cost</span>
                                    <span><?php echo sprintf("%.2f", $totalPrice) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
           

    <form action="order_confirmation.php" method="POST" class="w-2/3">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-5 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" required name="first_name" id="first_name" value="<?php echo $_SESSION['firstName'] ?>" autocomplete="given-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" required name="last_name" id="last_name" value="<?php echo $_SESSION['lastName'] ?>" autocomplete="family-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="text" required name="email" id="email" value="<?php echo $_SESSION['email'] ?>" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                        <label for="first_address" class="block text-sm font-medium text-gray-700">Street address 1st line</label>
                        <input type="text" required name="first_address" id="first_address" value="<?php echo $_SESSION['addressFirstLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                        <label for="second_address" class="block text-sm font-medium text-gray-700">Street address 2nd line</label>
                        <input type="text" name="second_address" id="second_address" value="<?php echo $_SESSION['addressSecondLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" required name="city" id="city" value="<?php echo $_SESSION['city'] ?>" autocomplete="address-level2" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="region" class="block text-sm font-medium text-gray-700">State</label>
                        <select id="region" required name="region" type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            <option value="">---</option>
                            <option value="AL" <?php if($_SESSION['state'] == 'AL') echo 'selected ' ?>>Alabama</option>
                            <option value="AK" <?php if($_SESSION['state'] == 'AK') echo 'selected ' ?>>Alaska</option>
                            <option value="AZ" <?php if($_SESSION['state'] == 'AZ') echo 'selected ' ?>>Arizona</option>
                            <option value="AR" <?php if($_SESSION['state'] == 'AR') echo 'selected ' ?>>Arkansas</option>
                            <option value="CA" <?php if($_SESSION['state'] == 'CA') echo 'selected ' ?>>California</option>
                            <option value="CO" <?php if($_SESSION['state'] == 'CO') echo 'selected ' ?>>Colorado</option>
                            <option value="CT" <?php if($_SESSION['state'] == 'CT') echo 'selected ' ?>>Connecticut</option>
                            <option value="DE" <?php if($_SESSION['state'] == 'DE') echo 'selected ' ?>>Delaware</option>
                            <option value="DC" <?php if($_SESSION['state'] == 'DC') echo 'selected ' ?>>District Of Columbia</option>
                            <option value="FL" <?php if($_SESSION['state'] == 'FL') echo 'selected ' ?>>Florida</option>
                            <option value="GA" <?php if($_SESSION['state'] == 'GA') echo 'selected ' ?>>Georgia</option>
                            <option value="HI" <?php if($_SESSION['state'] == 'HI') echo 'selected ' ?>>Hawaii</option>
                            <option value="ID" <?php if($_SESSION['state'] == 'ID') echo 'selected ' ?>>Idaho</option>
                            <option value="IL" <?php if($_SESSION['state'] == 'IL') echo 'selected ' ?>>Illinois</option>
                            <option value="IN" <?php if($_SESSION['state'] == 'IN') echo 'selected ' ?>>Indiana</option>
                            <option value="IA" <?php if($_SESSION['state'] == 'IA') echo 'selected ' ?>>Iowa</option>
                            <option value="KS" <?php if($_SESSION['state'] == 'KS') echo 'selected ' ?>>Kansas</option>
                            <option value="KY" <?php if($_SESSION['state'] == 'KY') echo 'selected ' ?>>Kentucky</option>
                            <option value="LA" <?php if($_SESSION['state'] == 'LA') echo 'selected ' ?>>Louisiana</option>
                            <option value="ME" <?php if($_SESSION['state'] == 'ME') echo 'selected ' ?>>Maine</option>
                            <option value="MD" <?php if($_SESSION['state'] == 'MD') echo 'selected ' ?>>Maryland</option>
                            <option value="MA" <?php if($_SESSION['state'] == 'MA') echo 'selected ' ?>>Massachusetts</option>
                            <option value="MI" <?php if($_SESSION['state'] == 'MI') echo 'selected ' ?>>Michigan</option>
                            <option value="MN" <?php if($_SESSION['state'] == 'MN') echo 'selected ' ?>>Minnesota</option>
                            <option value="MS" <?php if($_SESSION['state'] == 'MS') echo 'selected ' ?>>Mississippi</option>
                            <option value="MO" <?php if($_SESSION['state'] == 'MO') echo 'selected ' ?>>Missouri</option>
                            <option value="MT" <?php if($_SESSION['state'] == 'MT') echo 'selected ' ?>>Montana</option>
                            <option value="NE" <?php if($_SESSION['state'] == 'NE') echo 'selected ' ?>>Nebraska</option>
                            <option value="NV" <?php if($_SESSION['state'] == 'NV') echo 'selected ' ?>>Nevada</option>
                            <option value="NH" <?php if($_SESSION['state'] == 'NH') echo 'selected ' ?>>New Hampshire</option>
                            <option value="NJ" <?php if($_SESSION['state'] == 'NJ') echo 'selected ' ?>>New Jersey</option>
                            <option value="NM" <?php if($_SESSION['state'] == 'NM') echo 'selected ' ?>>New Mexico</option>
                            <option value="NY" <?php if($_SESSION['state'] == 'NY') echo 'selected ' ?>>New York</option>
                            <option value="NC" <?php if($_SESSION['state'] == 'NC') echo 'selected ' ?>>North Carolina</option>
                            <option value="ND" <?php if($_SESSION['state'] == 'ND') echo 'selected ' ?>>North Dakota</option>
                            <option value="OH" <?php if($_SESSION['state'] == 'OH') echo 'selected ' ?>>Ohio</option>
                            <option value="OK" <?php if($_SESSION['state'] == 'OK') echo 'selected ' ?>>Oklahoma</option>
                            <option value="OR" <?php if($_SESSION['state'] == 'OR') echo 'selected ' ?>>Oregon</option>
                            <option value="PA" <?php if($_SESSION['state'] == 'PA') echo 'selected ' ?>>Pennsylvania</option>
                            <option value="RI" <?php if($_SESSION['state'] == 'RI') echo 'selected ' ?>>Rhode Island</option>
                            <option value="SC" <?php if($_SESSION['state'] == 'SC') echo 'selected ' ?>>South Carolina</option>
                            <option value="SD" <?php if($_SESSION['state'] == 'SD') echo 'selected ' ?>>South Dakota</option>
                            <option value="TN" <?php if($_SESSION['state'] == 'TN') echo 'selected ' ?>>Tennessee</option>
                            <option value="TX" <?php if($_SESSION['state'] == 'TX') echo 'selected ' ?>>Texas</option>
                            <option value="UT" <?php if($_SESSION['state'] == 'UT') echo 'selected ' ?>>Utah</option>
                            <option value="VT" <?php if($_SESSION['state'] == 'VT') echo 'selected ' ?>>Vermont</option>
                            <option value="VA" <?php if($_SESSION['state'] == 'VA') echo 'selected ' ?>>Virginia</option>
                            <option value="WA" <?php if($_SESSION['state'] == 'WA') echo 'selected ' ?>>Washington</option>
                            <option value="WV" <?php if($_SESSION['state'] == 'WV') echo 'selected ' ?>>West Virginia</option>
                            <option value="WI" <?php if($_SESSION['state'] == 'WI') echo 'selected ' ?>>Wisconsin</option>
                            <option value="WY" <?php if($_SESSION['state'] == 'WY') echo 'selected ' ?>>Wyoming</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="zip" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                        <input type="text" required name="zip" id="zip" value="<?php echo $_SESSION['zip'] ?>" autocomplete="postal-code" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="flex justify-between px-4 py-3 bg-gray-50 sm:px-6">
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="shipping" class="block text-sm font-medium text-gray-700">Shipping Method</label>
                    <select id="categories" name="categories" class="appearance-none rounded inline-flex justify-center block px-4 py-2 border border-gray-300 placeholder-gray-500 text-center text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="free">Free Shipping</option>
                    </select>
                </div>
                <div class="w-1/2">
                    <button name='submit' type="submit" class="rounded w-full bg-gray-900 font-semibold hover:bg-gray-700 py-3 text-sm text-white uppercase">Place Order</button>
                </div>
            </div>
        </div>
    </form>
</main>

<?php // TEMPLATES
include 'templates/footer.html';
?>