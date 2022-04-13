<?php
    include 'db_connection.php';

session_start();

    $recipientID = 0;
    $recipientName = '';
    $subject = '';
    //If they click on the message seller link/button
    if($_SESSION['new'] == 1){
        $recipientID = $_SESSION['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $recipientName = $row['first_name'] . " " . $row['last_name'];
    }elseif($_SESSION['new'] == 0){
        //Need 3 things new,recipient, and messageID
        $recipientID = $_SESSION['recipient'];
        $sql = "SELECT * FROM Users WHERE user_ID=$recipientID;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $recipientName = $row['first_name'] . " " . $row['last_name'];

        $sql = "SELECT * FROM Messages WHERE message_ID=$_SESSION[messageID]";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $message = explode('&break&',$row['message']);
        $subject = $row['subject'];
    }
    if(isset($_POST['cancel'])){
        echo "hello";
        //header('location:user_messages.php');
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
        include 'templates/user-side-bar.php';
    ?>
    <!--Reply to message-->
    <section class="w-full p-4">
        <div class="w-full text-md">
            <form action="send.php" method="POST" id="form4">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Reply </h3>
                        <label for="to">To: </label>
                        <input id="to" name="to" disabled type="text" value="<?php echo $recipientName ?>" class="appearance-none rounded block w-2/5 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                    <?php

                    ?>
                    <div class="border-t border-gray-200">
                        <dl>
                            <?php
                            $check = 0;
                            //<!--messages-->
                            while($check < count($message)){
                                $sql = "SELECT * FROM Users WHERE user_ID=$message[$check]";
                                $sec = $conn->query($sql);
                                $user = $sec->fetch_assoc();

                                    echo "<p class='font-semibold " . (($message[$check] == $_SESSION['ID'])? 'text-blue-500': 'text-green-500') . " text-xs'>" . $user['first_name'] . " " . $user['last_name'] . "</p>";
                                echo "<div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                                    echo "<dt class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>" . $message[$check + 1] . "</dt>";
                                echo "</div>";

                                $check += 2;
                            }
                        ?>
                        </dl>
                    </div>
                </div>
                <div class="bg-white shadow sm:rounded">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div>
                                    <label for="to">To: </label>
                                    <input id="to" name="to" disabled type="text" value="<?php echo $sellerName ?>" class="appearance-none rounded block w-2/5 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                </div>
                                <input id="ID" name="ID" type="text" hidden value="<?php echo $recipientID ?>">
                                <div>
                                    <label for="subject">Subject: </label>
                                    <input id="subject" disabled required name="subject" type="text" value="<?php echo ((count($message) > 0)? 'RE: ' . $subject : $subject);?>" class="appearance-none rounded block w-2/5 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                </div>
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <div class="mt-1">
                                        <textarea required id="message" name="message" row="20" cols="40" wrap="soft" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Send a brief message."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Extra data to send along with submit-->
                            <!--The message that's being responded to-->
                            <input type="text" name='oldMessage' hidden value='<?php echo $row['message'];?>'>
                            <!--Recipients ID-->
                            <input type="text" name='recipientID' hidden value='<?php echo $recipientID;?>'>


                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button form='form4' name="send" id="send" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Send</button>
                            <button form='form4' name="cancel" id="cancel" type="submit" formnovalidate class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
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