<?php
    include 'db_connection.php';
    session_start();

    if(isset($_POST['accept'])){
        $sql = "UPDATE Users
        SET approval = 1
        WHERE user_ID=$_POST[accept]";

        //will eventually send message about accept

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }elseif(isset($_POST['decline'])){
        $sql = "UPDATE Users
        SET role = 'buyer'
        WHERE user_ID=$_POST[decline]";
        //Will eventually send message about decline

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<?php
//TEMPLATES
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
                  <h2 class="text-gray-600 font-semibold">Account Approval</h2>
                </div>
		            <div class="flex items-center justify-between"></div>
              </div>

              <!--Table-->
              <?php
              $sql = "SELECT * FROM Users WHERE role='seller' && approval=0";
              $result = $conn->query($sql);
              ?>
              <form action="approval.php" id="form1" method="POST">
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
                            ID Number
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                          </th>
                          <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Select
                          </th>
                        </tr>
                      </thead>
                      <!--Table Body-->
                      <tbody>
                        <?php
                        while($res = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                          <!--Qustion-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <input type="text" name="name" readonly value=" <?php echo $res['first_name'] . " " . $res['last_name'] ?> ">
                            </p>
                          </td>
                          <!--Answer-->
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <input type="text" name="name" readonly value=" <?php echo $res['user_ID'] ?> ">
                            </p>
                          </td>
                          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                              <input type="text" name="name" readonly value=" <?php echo $res['email'] ?> ">
                            </p>
                          </td>
                          <td class="px-5 py-5 border-b border-gray-200 bg-white flex justify-evenly">
                            <button type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['user_ID']?>">✅</button>
                            <button type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['user_ID']?>">❌</button>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
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

<!--This needs to be merged with the table above-->
<div>
        <table>
            <?php
            $sql = "SELECT * FROM Users WHERE role='seller' && approval=0";
            $result = $conn->query($sql);

            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $res['first_name'] . " " . $res['last_name'] . "</td>";
                echo "<td>" . $res['user_ID'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";
                ?>

                <?php
            }
            ?>

        </table>
</div>

<?php
include 'templates/footer.html';
?>
