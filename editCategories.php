<?php
    include 'db_connection.php';

    if(isset($_GET['categories'])) {
      $cName = $_GET['categories'];
      $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE `categories` = '$cName'");
      header("location:editCategories.php");
    }

    $table = "select * from categories";
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
                        <div class=" flex items-center justify-between">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Add/Edit Categories</h2>
                            </div>
		                    <div class="flex items-center">
                                <form action="editCategires.php" method="POST" class="flex">
                                    <button type="submit" name="edit" id="edit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
                                </form>
                            </div>
                        </div>

              <!--Table-->
                        <form action="editCategires.php" method="POST">
                            <div class="flex w-1/3">
                                <input type="text" name="cat" id="cat" placeholder="New Category" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                <button type="submit" name="add" id="add" value="add" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <!--Table Header-->
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Category
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Remove
                                            </th>
                                            </tr>
                                        </thead>
                            <!--Table Body-->
                                        <tbody>
                                            <tr>
                                            <!--Category-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                Random text:
                                                </p>
                                            </td>
                                            <!--Remove-->
                                            <td class='px-5 py-5 border-b border-gray-200 bg-white text-xs text-gray-500 font-semibold hover:text-red-500'>
                                                <a href='editCategories.php'>
                                                    Delete 
                                                </a>
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

<!--Merge-->
    <?php
    if(isset($_POST['add'])) {
      $sql = "INSERT INTO categories (categories) VALUES ('$_POST[cat]')";
      if ($conn->query($sql) === TRUE) {
        //echo "Updated";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
      header("location:editCategories.php");
    }
    ?>

    <form action="editCategories.php" method="POST">
      <button type="submit" name="edit" id="edit">Edit</button>
      <?php
      if(isset($_POST['edit'])) {
      ?>
    </form>


    <form action="editCategories.php" method="POST">
      <input type="text" name="cat" id="cat" placeholder="Add Categories">
      <button type="submit" name="add" id="add" value="add">Add New</button>

        <table>
          <tr>
            <th>Category</th>
            <th>Remove</th>
          </tr>


          <?php
          $row = mysqli_num_rows($query);
          if($row > 0) {
            while($res = mysqli_fetch_array($query)) {
              echo "<tr>
                <td>".$res['categories']."</td>
                <td><a href='editCategories.php?categories=".$res['categories']."'>Delete</a></td>
              </tr>";
            }
          }
          ?>
        </table>
        </form>
      <?php
}
      ?>

<?php
include 'templates/footer.html';
?>