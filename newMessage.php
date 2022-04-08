<?php
    include 'db_connection.php';
?>

<?php
session_start();
    $recipientID = 0;
    $sellerName = '';
    $previousMessage = '';
    $subject = '';
    //If they click on the message seller link/button
    if($_GET['new'] == 1){
        $recipientID = $_GET['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sellerName = $row['first_name'] . " " . $row['last_name'];
    }elseif($_GET['new'] == 0){
        //Need 3 things new,recipient, and messageID
        $recipientID = $_GET['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sellerName = $row['first_name'] . " " . $row['last_name'];

        $sql = "SELECT * FROM Messages WHERE message_ID=$_GET[messageID]";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $previousMessage = $row['message'];
        $subject = $row['subject'];
    }
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<main class="flex w-full">
    <!--Side Bar-->
    <aside class="w-80 h-screen bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-5 rounded">User Name</div>
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
                <div class="bg-gray-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300">
                    <a href="seller_account.php">Seller account</a>
                </div>
            </div>
        </div>
    </aside>
    <!--Reply to message-->
    <section class="w-1/2 p-4">
        <div class="w-full text-md">
            <form action="send.php" method="POST">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Reply </h3>
                        <label for="to">To: </label>
                        <input id="to" name="to" disabled type="text" value="<?php echo $sellerName ?>" class="appearance-none rounded block w-2/5 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                    <input id="ID" name="ID" type="text" hidden value="<?php echo $recipientID ?>">
                    <?php if($_GET['new'] == 0){
                        echo "<input id='previousID' name='previousID' type='text' hidden value='" . $_GET['messageID'] . "'>";
                    }else{
                        echo "<input id='product' name='product' type='text' hidden value='" . $_GET['productID'] . "'>";
                    }
                    ?>
                    <div class="border-t border-gray-200">
                        <dl>
                            <!--message-->
                            <p class="font-semibold text-gray-500 text-xs"><!--display "you" or "recipient"-->you and recipient's history</p>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">message</dt>
                        </div>
                            <!--message-->
                            <p class="font-semibold text-gray-500 text-xs"><!--display "you" or "recipient"-->you and recipient's history</p>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">message</dt>
                        </div>
                        </dl>
                    </div>
                </div>
                <div class="bg-white shadow sm:rounded">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div>
                                    <label for="subject">Subject: </label>
                                    <input id="subject" disabled required name="subject" type="text" value="<?php echo (strlen($previousMessage) > 0)?"Re: " . $subject:'';?>" class="appearance-none rounded block w-2/5 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                </div>
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <div class="mt-1">
                                        <textarea required id="message" name="message" row="20" cols="40" wrap="soft" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Send a brief message."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button name="send" id="send" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send</button>
                            <button name="cancel" id="cancel" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</main>
<?php // TEMPLATES
include 'templates/footer.html';
?>