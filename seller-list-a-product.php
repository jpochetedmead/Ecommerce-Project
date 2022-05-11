<?php
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="css/styles.css">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet"/>

  <title>BuyMerca</title>
</head>
<body class="h-full">

  <?php
  //TEMPLATES
      //include 'templates/head.html';
      include 'templates/nav-bar.php';
      //include 'templates/search-bar.html';
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

<form name="listNewProduct" class="form-horizontal" action="seller-list-a-product.php" method="POST" enctype="multipart/form-data">

<fieldset>

<legend class="h2 text-center p-10 text-primary">Tell us what you're selling</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="seller_ID">Seller ID</label>
  <div class="col-md-4">
  <input id="seller_ID" name="seller_ID" placeholder="Seller ID" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_ID">Product ID</label>
  <div class="col-md-4">
  <input id="product_ID" name="product_ID" placeholder="Product ID" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>
  <div class="col-md-4">
  <input id="title" name="title" placeholder="Title" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="customLabel">Custom Label (SKU)</label>
  <div class="col-md-4">
  <input id="customLabel" name="customLabel" placeholder="Custom Label (SKU)" class="form-control input-md" type="text">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category">Category</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control">
      <option value=""></option>
      <option value="Clothing">Clothing</option>
      <option value="Shoes">Shoes</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Sports">Sports</option>
      <option value="Handbags">Handbags</option>
      <option value="Sunglasses">Sunglasses</option>
      <option value="Books">Books</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="subCategory">Sub-Category</label>
  <div class="col-md-4">
    <select id="subCategory" name="subCategory" class="form-control">
      <option value=""></option>
      <option value="Clothing">Clothing</option>
      <option value="Shoes">Shoes</option>
      <option value="Fine Art">Fine Art</option>
      <option value="Sports">Sports</option>
      <option value="Handbags">Handbags</option>
      <option value="Sunglasses">Sunglasses</option>
      <option value="Books">Books</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="productCondition">Condition</label>
  <div class="col-md-4">
  <input id="productCondition" name="productCondition" placeholder="Condition" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="brand">Brand</label>
  <div class="col-md-4">
  <input id="brand" name="brand" placeholder="Brand" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="size">Product Size</label>
  <div class="col-md-4">
  <input id="size" name="size" placeholder="Product Size" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="weight">Product Weight</label>
  <div class="col-md-4">
  <input id="weight" name="weight" placeholder="Product Weight" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">
    <textarea id="description" name="description" placeholder="Description" class="form-control input-md" required="" type="text"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>
  <div class="col-md-4">
  <input id="price" name="price" placeholder="Price" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">List Price</label>
  <div class="col-md-4">
  <input id="list_price" name="list_price" placeholder="List Price" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="quantity">Quantity</label>
  <div class="col-md-4">
  <input id="quantity" name="quantity" placeholder="Quantity" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="discount_percent">Discount</label>
  <div class="col-md-4">
  <input id="discount_percent" name="discount_percent" placeholder="Discount" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="featured">ENABLE DISPLAY?</label><!-- If the seller wants the item featured or not -->
  <div class="col-md-4">
  <input id="featured" name="featured" placeholder="ENABLE DISPLAY? Yes / No" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">Comments</label>
  <div class="col-md-4">
  <input id="comment" name="comment" placeholder="Comments" class="form-control input-md" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="create_date">Date Listed</label>
  <div class="col-md-4">
  <input id="create_date" name="create_date" placeholder="Date Listed" class="form-control input-md" required="" type="date">
  </div>
</div>

 <!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Main Image</label>
  <div class="col-md-4">
    <input id="image" name="image" class="input-file" type="file" accept=".jpeg,.jpg,.png" required>
  </div>
</div>
<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="extraImage">Extra Images</label>
  <div class="col-md-4">
    <input id="extraImage1" name="extraImage1" class="input-file" type="file">
    <input id="extraImage2" name="extraImage2" class="input-file" type="file">
    <input id="extraImage3" name="extraImage3" class="input-file" type="file">
    <input id="extraImage4" name="extraImage4" class="input-file" type="file">
    <input id="extraImage5" name="extraImage5" class="input-file" type="file">
    <input id="extraImage6" name="extraImage6" class="input-file" type="file">
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-4 control-label">
    <button id="publish_Item" name="publish_Item" class="btn btn-primary" type="submit">Publish Item</button>
  </div>
</div>

</fieldset>
</form>

<?php // TEMPLATES
include 'templates/footer.html';
?>
