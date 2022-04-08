<?php
    include 'db_connection.php';
    session_start();

    if(isset($_POST['save'])){
        $sql = "UPDATE Users
        SET first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', address_first_line = '$_POST[first_address]', address_second_line = '$_POST[second_address]', city = '$_POST[city]', state_abbreviation = '$_POST[region]', zip_code = $_POST[zip]
        WHERE user_ID=$_SESSION[ID]";
        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $_SESSION['firstName'] = $_POST['first_name'];
        $_SESSION['lastName'] = $_POST['last_name'];
        $_SESSION['addressFirstLine'] = $_POST['first_address'];
        $_SESSION['addressSecondLine'] = $_POST['second_address'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['region'];
        $_SESSION['zip'] = $_POST['zip'];
    }
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
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

    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="user_change_shipping.php" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                            <input type="text" name="first_name" id="first_name" value="<?php echo $_SESSION['firstName'] ?>" autocomplete="given-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                            <input type="text" name="last_name" id="last_name" value="<?php echo $_SESSION['lastName'] ?>" autocomplete="family-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                            <input type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ?>" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="first_address" class="block text-sm font-medium text-gray-700">Street address 1st line</label>
                                            <input type="text" name="first_address" id="first_address" value="<?php echo $_SESSION['addressFirstLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="second_address" class="block text-sm font-medium text-gray-700">Street address 2nd line</label>
                                            <input type="text" name="second_address" id="second_address" value="<?php echo $_SESSION['addressSecondLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city" value="<?php echo $_SESSION['city'] ?>" autocomplete="address-level2" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="region" class="block text-sm font-medium text-gray-700">State</label>
                                            <select id="region" name="region" type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
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
                                            <input type="text" name="zip" id="zip" value="<?php echo $_SESSION['zip'] ?>" autocomplete="postal-code" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" name="save" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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