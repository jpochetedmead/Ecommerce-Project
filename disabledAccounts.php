<?php
    include 'db_connection.php';

    if(isset($_POST['enable'])) {
      $fName = $_POST['name'];
      $uId = $_POST['id'];
      $uEmail = $_POST['email'];
      $uPhone = $_POST['phone'];
      $table = "UPDATE Users SET disabled = 0 WHERE user_ID = '$uId'";

      $query = mysqli_query($conn, $table);
    }

    $table = "SELECT * FROM Users";
    $query = mysqli_query($conn, $table);
?>

<?php
session_start();
?>

<?php
include 'templates/head.html';
include 'templates/nav-admin.php';
?>
<main class="flex w-full">
  <?php
  include 'templates/admin-side-bar.php';
  ?>
    <section class="w-full p-4">
        <div class="w-full text-md">
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center justify-between pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Disabled Accounts</h2>
                            </div>
		                    <div class="flex items-center justify-between">
                            </div>
                        </div>

                        <!--Table-->
                        <div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <!--Table Header-->

                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Phone Number
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Enable
                                            </th>
                                            </tr>
                                        </thead>
                                        <!--Table Body-->
                                        <form action="disabledAccounts.php" method="POST">
                                        <tbody>
                                          <?php
                                          $row = mysqli_num_rows($query);
                                          if($row > 0) {
                                          while($res = mysqli_fetch_array($query)) {
                                          if($res['disabled'] == 1) {
                                            ?>
                                            <tr>
                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                              <p class='text-gray-900 whitespace-no-wrap'>
                                                <input type="text" name="name" readonly value=" <?php echo $res['first_name'] ?> ">
                                              </p>
                                            </td>

                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                              <p class='text-gray-900 whitespace-no-wrap'>
                                                <input type="" name="id" readonly value=" <?php echo $res['user_ID'] ?> ">
                                              </p>
                                            </td>

                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                              <p class='text-gray-900 whitespace-no-wrap'>
                                                <input type="text" name="email" readonly value=" <?php echo $res['email'] ?> ">
                                              </p>
                                            </td>

                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                              <p class='text-gray-900 whitespace-no-wrap'>
                                               <input type="text" name="phone" readonly value=" <?php echo $res['telephone_number'] ?> ">
                                              </p>
                                            </td>

                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-xs text-gray-500 font-semibold hover:text-red-500'>
                                                <button type="submit" name="enable">Enable</button>
                                            </td>
                                            </tr>
                                            <?php
                                          }
                                        }
                                      }
                                            ?>
                                        </tbody>
                                      </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!------>
	                </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'templates/footer.html';
?>
