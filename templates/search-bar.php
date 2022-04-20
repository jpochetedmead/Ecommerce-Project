<?php
  include 'db_connection.php';
  session_start();
?>

<!--Search bar-->
<div class="flex justify-center">
      <div class="mb-3 pt-6 xl:w-3/5">
          <form action="products.php" method="POST" class="input-group relative flex flex-row items-stretch w-full mb-4">
              <select name='cate' id='cate' class="form-select appearance-none block w-3/8 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                
                <?php
                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);
                while($res = mysqli_fetch_array($result)) {
                    echo "<option value='" . $res['categories_ID'] . "'>" . $res['categories'] ."</option>";
                }
                ?>
                  
              </select>
              <input type="search" id='item_search' name="item_search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
              <input type="submit" id="enter" name='enter' value="Search" class="btn inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"></input>
          </form>
      </div>
  </div>
<!--End of Search bar-->
