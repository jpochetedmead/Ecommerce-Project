<?php
    include 'db_connection.php';
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
                                <h2 class="text-gray-600 font-semibold">Seller Accounts</h2>
                            </div>
		                    <div class="flex items-center justify-between">
                                <form action="buyerAccounts.php" method="POST">
                                    <input type="submit" value="View All" name="search" class="px-5 py-5 border-b border-gray-200 bg-white cursor-pointer text-xs text-gray-600 font-semibold hover:text-gray-400">
                                </form>
                            </div>
                        </div>

                        <!--Table-->
                        <form action="buyerAccounts.php" id="form1" method="POST">
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
                                                Email
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Phone Number
                                            </th>
                                            </tr>
                                        </thead>
                                        <!--Table Body-->
                                        <tbody>
                                            <tr>
                                            <!--Name-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text:
                                                </p>
                                            </td>
                                            <!--Email-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text: 
                                                </p>
                                            </td>
                                            <!--ID-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text: 
                                                </p>
                                            </td>
                                            <!--Phone Number-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text: 
                                                </p>
                                            </td>
                                            </tr>
                                        </tbody>
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

<!---This needs to merged with the table above--->
<?php
if(isset($_POST['search'])){
  $search = $_POST['search'];
  $sql = "SELECT *
  FROM Users";
  $result = $conn->query($sql);
  $res = $result->fetch_assoc();
?>
  <table>

<?php
  while($res = mysqli_fetch_array($result)) {
    if($res['role'] == 'seller' && $res['approval'] == '1'){
      echo "<tr>";
      echo "<td>".$res['first_name']. " " .$res['last_name']."</td>";
      echo "<td>".$res['email']."</td>";
      echo "<td>".$res['user_ID']."</td>";
      echo "<td>".$res['telephone_number']."</td>";
    }
  }
}
?>
</table>

<?php
include 'templates/footer.html';
?>