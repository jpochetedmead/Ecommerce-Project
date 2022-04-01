<?php
    //include 'db_connection.php';
    require_once 'db_connection.php';
?>

<?php
  //require_once 'core/init.php';
$sql = "SELECT * FROM products WHERE featured = 1";
$featured = $conn->query($sql);
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

<!--
Two Sections For Sale | Archive

Pic -> Title
Sell Another | Share | Archive
-->

<div class="container">
  <div class="row gx-5 ">
    <h2 class="text-center">Featured Products</h2>
    <hr>

    <?php while($product = mysqli_fetch_assoc($featured)) :?>

    <div class="col-lg-4 col-md-12">
      <h4><?= $product['title']; ?></h4>
      <h4><?= $product['seller_ID']; ?></h4>
      <img class="bg-image hover-zoom hover-shadow" src="<?= $product['image']; ?>" alt="<?=$product['title']; ?>" id="images"/>
      <p>List Price: <s>$<?=$product['list_price']; ?></s></p>
      <p>Our Price: $<?=$product['price']; ?></p>
      <p>Description: <?=$product['description']; ?></p>
      <p>Sizes: <?=$product['sizes']; ?></p>
      <p>Quantity: <?=$product['quantity']; ?></p>
      <p>Published Date: <?=$product['create_date']; ?></p>
      <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#details-1">Details</button>
    </div>

    <div class="col-lg-4 col-md-6">
      <h4><?= $product['title']; ?></h4>
      <h4><?= $product['seller_ID']; ?></h4>
      <img src="<?= $product['image']; ?>" alt="<?=$product['title']; ?>" id="images"/>
      <p>List Price: <s>$<?=$product['list_price']; ?></s></p>
      <p>Our Price: $<?=$product['price']; ?></p>
      <p>Description: <?=$product['description']; ?></p>
      <p>Sizes: <?=$product['sizes']; ?></p>
      <p>Quantity: <?=$product['quantity']; ?></p>
      <p>Published Date: <?=$product['create_date']; ?></p>
      <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#details-1">Details</button>
    </div>

    <div class="col-lg-4 col-md-6">
      <h4><?= $product['title']; ?></h4>
      <h4><?= $product['seller_ID']; ?></h4>
      <img src="<?= $product['image']; ?>" alt="<?=$product['title']; ?>" id="images"/>
      <p>List Price: <s>$<?=$product['list_price']; ?></s></p>
      <p>Our Price: $<?=$product['price']; ?></p>
      <p>Description: <?=$product['description']; ?></p>
      <p>Sizes: <?=$product['sizes']; ?></p>
      <p>Quantity: <?=$product['quantity']; ?></p>
      <p>Published Date: <?=$product['create_date']; ?></p>
      <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#details-1">Details</button>
    </div>

  </div>

  <?php endwhile; ?>

</div>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
