<?php
    include 'db_connection.php';
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.html';
    /*
    switch($_SESSION['level']) {
      case '1':
        include 'templates/main-navbar.php';
        break;
      case '2':
        include 'templates/side-menu.php';
      default:
        include 'templates/alert-message.html';
    }
*/
?>

<!--shopping cart-->
<?php
$sql = "SELECT *
FROM Cart
INNER JOIN Products
ON Products.product_ID = Cart.product_ID
WHERE Cart.quantity = Products.quantity";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
?>

<?php
$sql = "SELECT product_ID
FROM Cart";
$result = $conn->query($sql);
$productID = $result->fetch_assoc();
$id = $productID['product_ID'];
?>

<?php
if(isset($res['quantity']) && isset($res['unit_price']) && isset($res['product_name']) && isset($res['description']) && isset($res['product_ID'])){
  $price = $res['unit_price'];
  $id = $res['product_ID'];
  $quanP = $res['quantity'];
  if(isset($_POST['update'])){
  $sql = "UPDATE Cart
  SET quantity = '$quanP'
  WHERE product_ID = '$id'";
  $result = $conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    echo "Updated";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }
?>

    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl">1 Items</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            <div class="w-20">
              <img src="https://via.placeholder.com/150" alt="placeholder">
            </div>
            <form action="" method="POST">
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm"><?php echo $res['product_name']?></span>
              <span class="text-blue-500 text-xs"><?php echo $res['category']?></span>
              <a href="removeCart.php" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
            </div>
          </div>
          <div class="flex justify-center w-1/5">
            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>

            <input type="hidden" name="id" value="$id">
            <input class="mx-2 border text-center w-8" type="text" value="<?php echo $res['quantity']?>" name="quanP" id="quanP">
            <input type="submit" class="btn btn-sm btn-info text-light mt-0 mb-1" name="update" value="update" id="update">

            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $res['unit_price']?></span>

          <?php
          $total = $res['quantity'] * $res['unit_price'];
          ?>
          <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $total?></span>
           </form>
        </div>
      </div>

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Items 1</span>
          <span class="font-semibold text-sm">$<?php echo $total?></span>
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost</span>
            <?php
            $aTotal = $total++;
            ?>
            <span>$<?php echo $aTotal ?></span>
          </div>
          <button name='submit' type="submit" class="rounded bg-gray-900 font-semibold hover:bg-gray-700 py-3 text-sm text-white uppercase w-full">Checkout</button>
        </div>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Your Cart is Empty</h1>
        </div>
      </div>
      <?php
    }
      ?>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
