<?php
    include 'db_connection.php';
    session_start();

//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';

    $id = rand(pow(10, 7-1), pow(10, 7)-1);
    while(true){
      $sql = "SELECT * FROM Transactions WHERE transaction_ID=$id";
      $result = $conn->query($sql);
      $sel = $result->fetch_assoc();
      if($sel['transaction_ID'] == $id){
        $id = rand(pow(10, 5-1), pow(10, 5)-1);
        continue;
      }else{
        break;
      }
    }
    $totalPrice = 0;
    $sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
    $result = $conn->query($sql);

    while($res = mysqli_fetch_array($result)) {
        $sql = "SELECT * FROM products WHERE product_ID=$res[product_ID]";
        $resu = $conn->query($sql);
        $use = $resu->fetch_assoc();

        $totalPrice = $totalPrice + ($res['quantity'] * $use['price']);

        $sql = "INSERT INTO Transactions (product_ID, product_quantity, user_ID, transaction_ID, price_at_purchase)
        VALUES($res[product_ID], $res[quantity], $_SESSION[ID], $id, $use[price])";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $newQuantity = $use['quantity'] - $res['quantity'];

        $sql = "UPDATE products SET quantity=$newQuantity WHERE product_ID=$res[product_ID]";
        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
          }else{
            //echo "Error: " . $sql . "<br>" . $conn->error;
          }
    };
    
?>


<main class="flex flex-col w-full">
    <div class='px-4 py-5 sm:px-6 flex justify-center w-full'>
        <h2 class="font-semibold text-gray-900">Thank you! Your order has been confirmed!</h2>
    </div>
    <section class="w-full p-4">
      <div class="w-full text-md">
          <div class='bg-white shadow sm:rounded'>
            <div class='px-4 py-5 sm:px-6'>
              <h3 class='text-lg leading-6 font-medium text-gray-900'>Order number: <? echo $id ?></h3>
            </div>
            <div class='border-t border-gray-200'>
              <dl>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Full name</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><? echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Shipping address</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><? echo $_SESSION['addressFirstLine'] ?></dd>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><? echo $_SESSION['addressSecondLine'] ?></dd>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><? echo $_SESSION['city'] . " " . $_SESSION['state'] . ", " . $_SESSION['zip'] ?></dd>
                </div>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Items purchased</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>
                    <div>
                    <?php
                        $sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
                        $result = $conn->query($sql);

                        while($res = mysqli_fetch_array($result)) {
                            $sql = "SELECT * FROM products WHERE product_ID=$res[product_ID]";
                            $resu = $conn->query($sql);
                            $use = $resu->fetch_assoc();

                            echo "<p>" . $res['quantity'] . "X  " . $use['title'] . "</p>";
                        }
                    ?>
                    </div>

                    </dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Total payment</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'><? echo sprintf("%.2f", $totalPrice) ?></dd>
                </div>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Status</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>Processing</dd>
                </div>
              </dl>
            </div>
          </div>
      </div>
    </section>

</main>


<?php // TEMPLATES
include 'templates/footer.html';

$sql = "DELETE FROM Cart WHERE user_ID=$_SESSION[ID]";
    if ($conn->query($sql) === TRUE) {
        //echo "Record Deleted successfully";
    } else {
        //echo "Delete Error: " . $sql . "<br>" . $conn->error;
    }
?>