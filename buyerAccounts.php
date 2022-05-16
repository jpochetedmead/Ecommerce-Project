<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
include 'templates/head.html';
include 'templates/nav-admin.php'
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
                  <h2 class="text-gray-600 font-semibold">Buyer Accounts</h2>
                </div>
		            <div class="flex items-center justify-between">
                  <!---View All-->
                </div>
              </div>

              <!--Table-->
              <form action="buyerAccounts.php" id="form1" method="POST">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                  <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <!--Table Header-->
                    <?php
                    $sql = "SELECT * FROM Users";
                    $query = mysqli_query($conn, $sql);
                    ?>
                    <table class="min-w-full leading-normal">
                      <thead>
                        <tr>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User Name
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User Email
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User ID
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User Phone Number
                          </th>
                        </tr>
                      </thead>
                      <!--Table Body-->
                      <?php
                      while($res = mysqli_fetch_array($query)) {
                        $row = mysqli_num_rows($query);
                        if($row > 0) {
                          if($res['role'] == 'buyer' && $res['approval'] == '0'){
                      ?>
                      <tbody>
                        <tr>
                          <!--User name-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <?php echo $res['first_name']. " " .$res['last_name']?>
                            </p>
                          </td>
                          <!--User email-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <?php echo $res['email']?>
                            </p>
                          </td>
                          <!--User ID-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <?php echo $res['user_ID']?>
                            </p>
                          </td>
                          <!--User phone number-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <?php echo $res['telephone_number']?>
                            </p>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                          }
                        }
                      }
                      ?>
					          </table>
				          </div>
			          </div>
              </form>
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
