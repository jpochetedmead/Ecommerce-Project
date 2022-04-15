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
?>

<main class="flex w-full">

    <!--Contact to seller message-->
    <section class="w-full p-4">
        <div class="w-full text-md">
            <form action="send.php" method="POST">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Contact Seller</h3>
                    </div>
                    <?php if($_GET['new'] == 0){
                        echo "<input id='previousID' name='previousID' type='text' hidden value='" . $_GET['messageID'] . "'>";
                    }else{
                        echo "<input id='product' name='product' type='text' hidden value='" . $_GET['productID'] . "'>";
                    }
                    ?>
                </div>
                <div class="bg-white shadow sm:rounded">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md">
                            <div class="flex flex-col items-center px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="flex flex-col w-2/5 justify-between">
                                    <div>
                                        <label for="to">To: </label>
                                        <input id="to" name="to" disabled type="text" value="<?php echo $sellerName ?>" class="appearance-none rounded block w-1/2 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                    <input id="ID" name="ID" type="text" hidden value="<?php echo $recipientID ?>">
                                    <div>
                                        <label for="subject">Subject: </label>
                                        <input id="subject" required name="subject" type="text" value="<?php echo (strlen($previousMessage) > 0)?"Re: " . $subject:'';?>" class="appearance-none rounded block w-1/2 px-3 py-2 border border-gray-300 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <div class="mt-1">
                                        <textarea required id="message" name="message" row="40" cols="80" wrap="soft" class="resize-none h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Send a brief message."></textarea>
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