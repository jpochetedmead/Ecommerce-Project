<?php
    include 'db_connection.php';
    session_start();
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
    
    if(isset($_SESSION['ID'])){
        $sql = "SELECT * FROM Users WHERE user_ID=$_SESSION[ID]";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        if($user['role'] == 'buyer'){
            ?>
            <div class="bg-gray-50">
                <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block">Want to sell your own items?</span>
                        <span class="block text-blue-800">Sign up to become a seller.</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href='sellerRegistration.php' class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-blue-600"> Get started </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="bg-gray-50">
            <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Want to sell your own items?</span>
                    <span class="block text-blue-800">Sign up to become a seller.</span>
                </h2>
                <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                    <div class="inline-flex rounded-md shadow">
                        <a href='register.php' class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-blue-600"> Get started </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


?>

    <!--Popular Products-->
    <div class="bg-white">
        <form action="product_details.php" method="POST" id="transfer">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Popular Products</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php
            $sql = "SELECT product_ID, COUNT(*) FROM Transactions GROUP BY product_ID ORDER BY 2 DESC;";
            $result = $conn->query($sql);

            while($res = mysqli_fetch_array($result)) {
                $sql = "SELECT * FROM products WHERE product_ID=$res[product_ID];";
                $search = $conn->query($sql);
                $product = $search->fetch_assoc();
            //<!--Product 1-->
                echo "<div class='group relative'>";
                    echo "<div class='w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none'>";
                        echo "<img src='" . $product['image'] . "' alt='placeholder' class='w-full h-full object-center object-cover lg:w-full lg:h-full'>";
                    echo "</div>";
                    echo "<div class='mt-4 flex justify-between'>";
                        echo "<div>";
                            echo "<h3 class='text-sm text-gray-700'>";
                            echo "<button form='transfer' name='product' value='" . $product['product_ID'] . "'>";
                            echo "<span aria-hidden='true' class='absolute inset-0'></span>";
                                echo $product['title'];
                            echo "</button>";
                            echo "</h3>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
                ?>
            </div>
        </div>
        </form>
    </div>

<?php // TEMPLATES
include 'templates/footer.html';
?>
