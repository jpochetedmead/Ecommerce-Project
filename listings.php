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
session_start();
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.html';
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

<div class="container m-10">
  <h1 class="text-center h1 m-5 text-info">Products</h1>

<div class="col-xs-12 col-md-6">

  <?php while($product = mysqli_fetch_assoc($featured)) :?>

	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						<img src="<?= $product['image']; ?>" alt="194x228" class="img-responsive">
            <span class="tag2 hot">
							HOT
						</span>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								<?= $product['title']; ?>
							</a>
							<a href="#">
								<span>Product Category: <?=$product['categories']; ?></span>
							</a>
						</h5>
            <p class="price-container">
							<span>List Price: <s>$<?=$product['list_price']; ?></s></span>
						</p>
						<p class="price-container">
							<span>Our Price: $<?=$product['price']; ?></span>
						</p>
						<span class="tag1"></span>
				</div>
				<div class="description">
					<p class="text-danger"><?=$product['description']; ?></p>
          <p>
            <small>seller_ID: <?= $product['seller_ID']; ?></small>
            <br>
            <small>Sizes: <?=$product['sizes']; ?></small>
            <br>
            <small>Quantity: <?=$product['quantity']; ?></small>
            <br>
            <small>Published Date: <?=$product['create_date']; ?></small>
          </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-12">
							<a href="javascript:void(0);" class="btn btn-success">Add to cart</a>
              <a href="javascript:void(0);" class="btn btn-info">More info</a>
						</div>
						<div class="col-md-12">
							<div class="rating">Rating:
								<label for="stars-rating-5"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-4"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-3"><i class="fa fa-star text-success"></i></label>
								<label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
								<label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->
</div>

<?php endwhile; ?>

</div>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
