<?php
    include 'db_connection.php';
    session_start();

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM Messages WHERE message_ID=$_POST[delete]";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
    }

    if(isset($_POST['message'])){
        $arr = explode(' ',$_POST['message']);
        $_SESSION['new'] = 0;
        $_SESSION['recipient'] = $arr[1];
        $_SESSION['messageID'] = $arr[0];
        header('location:newMessage.php');
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
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center justify-between pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Messages</h2>
                            </div>
		                    <div class="flex items-center justify-between"></div>
                        </div>
                        <?php
                            if(isset($_GET['success'])) {
                                echo "<P class='text-red-500'>Message was sent!</p>";
                            }
                            ?>
                        <div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <form action="user_messages.php" method="POST" id="form3"></form>
                                    <table class="min-w-full leading-normal">
                                        <!--Table Header-->
						                <thead>
							                <tr>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Name
								                </th>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									                Date
								                </th>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									                Subject
								                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    
                                                    </th>
							                </tr>
						                </thead>
                                        <!--Table Body-->
                                        <tbody>
                                            <?php
                                            $sql="SELECT * FROM Messages WHERE recipient_ID=$_SESSION[ID] ORDER BY create_date DESC";
                                            $result = $conn->query($sql);

                                            while($res = mysqli_fetch_array($result)) {
                                                $sql = "SELECT * FROM Messages m INNER JOIN Users u on m.sender_ID=u.user_ID WHERE m.message_ID=$res[message_ID]";
                                                $info = $conn->query($sql);
                                                $user = $info->fetch_assoc();
                                                $date = substr($user['create_date'], 0, 10);
                                                // Creating timestamp from given date
                                                $timestamp = strtotime($date);
                                                // Creating new date format from that timestamp
                                                $new_date = date("F-d-Y", $timestamp);
							                echo "<tr>";
                                                //Name of sender
								                echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
									                echo "<div class='flex items-center'>";
											            echo "<div class='ml-3'>";
												            echo "<button form='form3' name='message' class='text-blue-500' value='" . $user['message_ID'] . " " . $user['sender_ID'] . "' hover:text-blue-300 whitespace-no-wrap'>" . $user['first_name'] . " " . $user['last_name'] . "</button>";
											            echo "</div>";
										            echo "</div>";
								                echo "</td>";
                                                //Date of message
								                echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
									                echo "<p class='text-gray-900 whitespace-no-wrap'>" . $new_date . "</p>";
								                echo "</td>";
                                                //Subject
								                echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
                                                    echo "<p class='text-gray-900 whitespace-no-wrap'>" . $user['subject'] . "</p>";
								                echo "</td>";
                                                //Delete
                                                echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-xs text-gray-500 font-semibold hover:text-red-500'>";
                                                    echo "<button name='delete' form='form3' value='" . $user['message_ID'] . "'>Delete</button>";
                                                echo "</td>";
							                echo "</tr>";
                                            }
							                ?>
						                </tbody>
					                </table>
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