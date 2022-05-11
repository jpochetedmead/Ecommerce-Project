<!-- Nav Bar -->
<?php
  include 'db_connection.php';
  session_start();
  $total = 0;

?>
<!-- Nav Bar -->
<nav class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between"><h1><a href="index.php" class="px-3 py-2">
        <img class="w-20 hover:bg-gray-500" src="images/buymerca.png" alt="BuyMerca-logo"/>
      </a></h1>
        
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">

              
              <a href="products.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
              <?php
              if (isset($_SESSION['ID'])) {
              ?>
              <a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
              <?php
            } else if(!isset($_SESSION['ID'])) {
              ?>
              <a href="login.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign In</a>

              <a href="register.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
              <?php
            }
              ?>
            </div>
          </div>
        </div>
        <?php
          if(isset($_SESSION['ID'])){
            $sql = "SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
            $quan = $conn->query($sql);
            while($use = mysqli_fetch_array($quan)) {
              $total = $total + $use['quantity'];
            }
          }
          
        ?>

        <div>
            <a href="cart.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                Cart
                
                <span><?php echo $total ?></span>
            </a>
            <a href="user_account.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">My Account</a>
        </div>
      </div>
    </div>

      <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
        
        <a href="products.php" class=" text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
        <?php
        if (isset($_SESSION['ID'])) {
        ?>
        <a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
        <?php
        } else if(!isset($_SESSION['ID'])) {
        ?>
        <a href="login.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign In</a>

        <a href="register.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
        <?php
        }
        ?>
    </div>
  </div>
</nav>
  <!-- End of Nav Bar -->
