<?php
include 'db_connection.php';
session_start();


if(isset($_POST['transfer'])) {
    $arr = explode(' ',$_POST['transfer']);
    $trans = $arr[0];
    $ID = $arr[1];

    $sql="SELECT * FROM Transactions WHERE transaction_ID=$trans";
    $result = $conn->query($sql);
    while($res = mysqli_fetch_array($result)) {
        $sql = "SELECT * FROM products WHERE product_ID=$res[product_ID]";
        $resu = $conn->query($sql);
        $check = $resu->fetch_assoc();
        if($check['seller_ID'] == $ID){
            $sql = "UPDATE Transactions SET payout = 1 WHERE transaction_ID=$trans AND product_ID=$res[product_ID]";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

}

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
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Payouts and Transactions</h2>
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
                                                Order Number
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Customer Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Payout
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            </tr>
                                        </thead>
                                        <!--Table Body-->
                                        <form action="seller_payouts.php" id="form1" method="POST">
                                        <tbody>
                                        <?php
                                        $sql="SELECT * FROM Transactions t INNER JOIN products p on t.product_ID=p.product_ID  WHERE p.seller_ID=$_SESSION[ID] GROUP BY transaction_ID ORDER BY purchase_date DESC";
                                        $result = $conn->query($sql);

                                        while($res = mysqli_fetch_array($result)) {
                                            $total = 0;

                                            
                                            $sql = "SELECT * FROM Users WHERE user_ID=$res[user_ID]";
                                            $resu = $conn->query($sql);
                                            $t = $resu->fetch_assoc();
                                        ?>
                                            <tr>
                                            <!--Order number-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="order.php?trans=<?php echo $res['transaction_ID']?>" class="text-blue-500 hover:text-blue-300 whitespace-no-wrap">
                                                <?php echo $res['transaction_ID'] ?>
                                                </a>
                                            </td>
                                            <!--Name-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $t['first_name'] . " " . $t['last_name'] ?>
                                                </p>
                                            </td>

                                            <?php

                                            $sql = "SELECT * FROM Transactions t INNER JOIN products p ON t.product_ID = p.product_ID WHERE t.transaction_ID=$res[transaction_ID]";
                                            $count = $conn->query($sql);
                                            while($row = mysqli_fetch_array($count)) {
                                                if($row['seller_ID'] == $_SESSION['ID']){
                                                    $total += ($row['product_quantity'] * $row['price_at_purchase']);
                                                }
                                            }

                                            ?>
                                            <!--Payout-->
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">$
                                                <?php echo sprintf("%.2f", $total) ?>
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white">
                                            <?php
                                                if($res['payout'] == 0){
                                                   ?>
                                                    <div class="flex items-center">
                                                        <button type="submit" form="form1" value='<?php echo $res['transaction_ID'] . " " . $res['seller_ID'] ?>' name="transfer" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Transfer Funds</button>
                                                    </div>
                                                   <?php
                                                }else{
                                                   ?>
                                                    <p>Transferred</p>
                                                   <?php
                                                }

                                            ?>
                                                
                                            </td>
                                            </tr>
                                        <?php
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