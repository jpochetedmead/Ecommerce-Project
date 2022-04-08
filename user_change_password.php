<?php
    include 'db_connection.php';
    session_start();

    $error = 0;
    if(isset($_POST['submit'])){
        $sql = "SELECT * FROM Users WHERE user_ID = $_SESSION[ID]";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();

        if($_POST['password'] != $user['password']){
            $error = 1;
        }elseif($_POST['newPassword'] != $_POST['conPassword']){
            $error = 2;
        }
        if($error == 0){
            $sql = "UPDATE Users
            SET password = '$_POST[newPassword]'
            WHERE user_ID=$_SESSION[ID]";
            if ($conn->query($sql) === TRUE) {
                //echo "Password updated successfully";
                $error = 3;
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

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

    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="user_change_password.php" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="flex flex-col gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Old password</label>
                                            <input id="password" name="password" type="password" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="newPassword" class="block text-sm font-medium text-gray-700">New password</label>
                                            <input id="newPassword" name="newPassword" type="password" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="conPassword" class="block text-sm font-medium text-gray-700">Confirm new password</label>
                                            <input id="conPassword" name="conPassword" type="password" class="appearance-none rounded relative block w-1/2 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        </div>
                                        <?php
                                            if($error == 1){
                                                echo "<p class='text-red-600'>Your old password does not match</p>";
                                            }elseif($error == 2){
                                                echo "<p class='text-red-600'>New password and confirm password do not match</p>";
                                            }elseif($error == 3){
                                                echo "<p class='text-green-600'>Password changed successfully</p>";
                                            }
                                        ?>

                                        
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button name='submit' type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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