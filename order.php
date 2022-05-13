<?php
    include 'db_connection.php';
    session_start();




//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<main class="flex w-full">
    <?php
    include 'templates/seller-side-bar.php';
    ?>
    <section class="w-full p-4">
      <div class="w-full text-md">
          <div class='bg-white shadow sm:rounded'>
            <div class='px-4 py-5 sm:px-6'>
              <h3 class='text-lg leading-6 font-medium text-gray-900'>Order number: <?php echo $_GET['trans'] ?></h3>
            </div>
            <?php
            $sql = "SELECT * FROM Transactions WHERE transaction_ID=$_GET[trans] LIMIT 1";
            $result = $conn->query($sql);
            $account = $result->fetch_assoc();
            $id = $account['user_ID'];

            $sql = "SELECT * FROM Users WHERE user_ID = $id";
            $resu = $conn->query($sql);
            $user = $resu->fetch_assoc();
            ?>
            <div class='border-t border-gray-200'>
              <dl>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Full name</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><?php echo $user['first_name'] . " " . $user['last_name'] ?></dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Shipping address</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><?php echo $user['address_first_line'] ?></dd>
                    <dt class='text-sm font-medium text-gray-500'> </dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><?php echo $user['address_second_line'] ?></dd>
                    <dt class='text-sm font-medium text-gray-500'> </dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><?php echo $user['city'] . ", " . $user['state_abbreviation'] . " " . $user['zip_code'] ?></dd>
                </div>
                
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Items purchased</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>
                    <div>
                    <?php
                    $shipped = 0;
                    $total = 0;
                    $sql = "SELECT * FROM Transactions t INNER JOIN products p ON t.product_ID = p.product_ID WHERE t.transaction_ID=$_GET[trans]";
                    $count = $conn->query($sql);
                    while($row = mysqli_fetch_array($count)) {
                        if($row['seller_ID'] == $_SESSION['ID']){
                            if($row['shipped'] == 1) $shipped = 1;
                            $total += ($row['product_quantity'] * $row['price_at_purchase']);
                            echo "<p>" . $row['product_quantity'] . "X " . $row['title'] . "</p>";
                        }
                    }
                    ?>
                    </div>
                    </dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Total payment</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>$<?php echo sprintf("%.2f", $total) ?></dd>
                </div>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Status</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><?php echo (($shipped == 1)? 'Shipped':'Processing') ?></dd>
                </div>
              </dl>
            </div>
          </div>
      </div>
    </section>

</main>


<?php // TEMPLATES
include 'templates/footer.html';
?>