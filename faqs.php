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

<?php
$sql = "SELECT question
FROM FAQ";
$result = $conn->query($sql);
$ques = $result->fetch_assoc();
$q = $ques['question'];
?>

<?php
$sql = "SELECT answer
FROM FAQ";
$result = $conn->query($sql);
$ans = $result->fetch_assoc();
$a = $ans['answer'];
?>

  <main class="flex w-full">
    <section class="w-full p-4">
      <div class="w-full text-md">
        <div class="bg-white shadow sm:rounded">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="bg-white p-8 rounded-md w-full">
              <div class=" flex items-center justify-between pb-6">
                <div>
                  <h2 class="text-gray-600 font-semibold">FAQ</h2>
                </div>
		            <div class="flex items-center justify-between"></div>
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
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Question
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Answer
                          </th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT *
                        FROM FAQ";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_array($result)) {
                      ?>
                      <!--Table Body-->
                      <tbody>
                        <tr>
                          <!--Qustion-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap"><?php echo $row['question']?></p>
                          </td>
                          <!--Answer-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap"><?php echo $row['answer']?></p>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
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
<?php // TEMPLATES
  include 'templates/footer.html';
?>
