<?php
    include 'db_connection.php';
    session_start();
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';

if(isset($_POST['checkout'])){
  header("location:checkout.php");
}
if(isset($_POST['delete'])){
  $sql = "DELETE FROM Cart WHERE product_ID=$_POST[delete]";
  if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
  } else {
    //echo "Error deleting record: " . $conn->error;
  }
}
if(isset($_POST['minus'])){
  $sql = "SELECT * FROM Cart WHERE product_ID=$_POST[minus]";
  $result = $conn->query($sql);
  $minus = $result->fetch_assoc();

  $quan = $minus['quantity'] - 1;
  if($quan > 0){
    $sql = "UPDATE Cart SET quantity=$quan WHERE product_ID=$_POST[minus] && user_ID=$_SESSION[ID]";
    if ($conn->query($sql) === TRUE) {
      //echo "Record updated successfully";
    }else{
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

if(isset($_POST['plus'])){
  $sql = "SELECT * FROM Cart WHERE product_ID=$_POST[plus]";
  $result = $conn->query($sql);
  $minus = $result->fetch_assoc();

  $sql = "SELECT * FROM products WHERE product_ID=$_POST[plus]";
  $result = $conn->query($sql);
  $check = $result->fetch_assoc();

  $quan = $minus['quantity'] + 1;
  if($quan <= $check['quantity']){
    $sql = "UPDATE Cart SET quantity=$quan WHERE product_ID=$_POST[plus] && user_ID=$_SESSION[ID]";
    if ($conn->query($sql) === TRUE) {
      //echo "Record updated successfully";
    }else{
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$totalQuantity = 0;
$sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
        $result = $conn->query($sql);
        while($res = mysqli_fetch_array($result)) {
          $totalQuantity += $res['quantity'];
        }
?>

<!--shopping cart-->
<form action="cart.php" method="POST" id="form1" class="container mx-auto mt-10">
  <!--Display when item is added-->
  <div <?php //hidden if empty ?>>
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl"><?php echo $totalQuantity ?> Items</h2>
          </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        
        <?php 

        $totalPrice = 0;
        $sql="SELECT * FROM Cart WHERE user_ID=$_SESSION[ID]";
        $result = $conn->query($sql);

        while($res = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM products INNER JOIN brand ON products.brand=brand.brand_ID WHERE products.product_ID=$res[product_ID]";
          $product = $conn->query($sql);
          $thing = $product->fetch_assoc();
          $totalPrice += ($thing['price'] * $res['quantity']);

          echo "<div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>";
            echo "<div class='flex w-2/5'>"; //Product
              echo "<div class='w-20'>";
                echo "<img src='" . $thing['image'] . "' alt='placeholder'>";
              echo "</div>";
              echo "<div class='flex flex-col justify-between ml-4 flex-grow'>";
              echo "<span class='font-bold text-sm'>" . $thing['title'] . "</span>";
                echo "<span class='text-blue-500 text-xs'>" . $thing['brand'] . "</span>";
                echo "<button form='form1' name='delete' type='submit' value='". $thing['product_ID'] ."' class='font-semibold hover:text-red-500 text-gray-500 text-xs'>Remove</button>";
              echo "</div>";
            echo "</div>";
            echo "<div class='flex justify-center w-1/5'>";
              echo "<button form='form1' name='minus' type='submit' value='". $thing['product_ID'] ."'>-</button>";

              echo "<input class='mx-2 border text-center w-8' disabled type='text' value='" . $res['quantity'] . "'>";

              echo "<button form='form1' name='plus' type='submit' value='". $thing['product_ID'] ."'>+</button>";
            echo "</div>";
            echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $thing['price'] . "</span>";
            echo "<span class='text-center w-1/5 font-semibold text-sm'>" . $thing['price'] * $res['quantity'] . "</span>";
          echo "</div>";
        }
        ?>

      </div>

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Items</span>
          <span class="font-semibold text-sm"><?php echo $totalQuantity ?></span>
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost</span>
            <span><?php echo $totalPrice ?></span>
          </div>
          <button name='checkout' type="submit" class="rounded bg-gray-900 font-semibold hover:bg-gray-700 py-3 text-sm text-white uppercase w-full">Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <!--If Cart is Empty-->
  <div <?php //hidden if item is added?>>
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Your Cart is Empty</h1>
        </div>
      </div>
      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
          </div>
          <button hidden name='submit' type="submit" class="rounded bg-gray-900 font-semibold hover:bg-gray-700 py-3 text-sm text-white uppercase w-full">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php // TEMPLATES
  include 'templates/footer.html';
?>
