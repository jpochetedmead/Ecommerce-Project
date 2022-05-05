<?php
    include 'db_connection.php';
session_start();

if(isset($_POST['change'])){
    $sql = "UPDATE Transactions SET shipped=1 WHERE transaction_ID=$_POST[change]";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<main class="flex w-full">
    <?php
    //TEMPLATES
        include 'templates/seller-side-bar.php';
    ?>

    <section class="w-full p-4">
        <div class="w-full text-md">

            <?php

                $sql="SELECT * FROM Transactions t INNER JOIN products p on t.product_ID=p.product_ID  WHERE p.seller_ID=$_SESSION[ID] GROUP BY transaction_ID ORDER BY purchase_date DESC";
                $result = $conn->query($sql);
                $totalPrice = 0;
                $counter = 0;
                while($res = mysqli_fetch_array($result)) {

                    $sql = "SELECT * FROM Users WHERE user_ID=$res[user_ID]";
                    $resul = $conn->query($sql);
                    $thing = $resul->fetch_assoc();
                    $date = date_create($res['purchase_date']);
                    
                    echo "<div class='bg-white shadow sm:rounded mb-5'>";
                    echo "<div class='px-4 py-5 sm:px-6'>";
                    echo "<h3 class='text-lg leading-6 font-medium text-gray-900'>Order number:". $res['transaction_ID'] . "</h3>";
                    echo "</div>";
                    echo "<div class='border-t border-gray-200'>";
                    echo "<dl>";
                        echo "<div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Full name</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>" . $thing['first_name'] . " " . $thing['last_name'] . "</dd>";
                        echo "</div>";
                        echo "<div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Shipping address</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>" . $thing['address_first_line'] . " " . $thing['addres_second_line'] . " " . $thing['city'] . " " . $thing['state_abbreviation'] . ", " . $thing['zip_code'] . "</dd>";
                        echo "</div>";
                        echo "<div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Items purchased</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>";
                            echo "<div>";
                            
                            $sql = "SELECT * FROM Transactions t INNER JOIN products p ON t.product_ID = p.product_ID WHERE t.transaction_ID=$res[transaction_ID]";
                            $count = $conn->query($sql);
                            while($row = mysqli_fetch_array($count)) {
                                echo "<p>" . $row['product_quantity'] . "X   " . $row['title'] . "</p>";
                                $totalPrice += ($row['product_quantity'] * $row['price_at_purchase']);
                            }
                            echo "</div>";

                            echo "</dd>";
                        echo "</div>";
                        echo "<div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Total payment</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>$" . sprintf("%.2f", $totalPrice) ."</dd>";
                        echo "</div>";
                        echo "<div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Date of Purchase</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>" . date_format($date, 'F d, Y') ."</dd>";
                        echo "</div>";
                        
                        $sql = "SELECT * FROM Transactions WHERE transaction_ID=$res[transaction_ID] LIMIT 1";
                        $resu = $conn->query($sql);
                        $t = $resu->fetch_assoc();


                        echo "<div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                            echo "<dt class='text-sm font-medium text-gray-500'>Status</dt>";
                            echo "<dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>" . (($t['shipped']==0)? 'Processing' : 'Shipped') . "</dd>";
                        echo "</div>";
                        if($t['shipped']==0){
                            echo "<form action='seller_sold.php' method='POST' id='form" . $counter . "'>";
                            echo "<div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>";
                                echo "<dt class='text-sm font-medium text-gray-500'>Change Status</dt>";
                                echo "<dd class='mt-1 text-sm text-blue-600 sm:mt-0 sm:col-span-2'><button name='change' id='change' form='form" . $counter . "' value='" . $res['transaction_ID'] . "'>Order Shipped</button></dd>";
                            echo "</div>";
                            echo "</form>";
                        }
                        
                    echo "</dl>";
                    echo "</div>";
                echo "</div>";
                $counter++;
                }

            ?>
            

        </div>
    </section>

</main>
<?php // TEMPLATES
include 'templates/footer.html';
?>