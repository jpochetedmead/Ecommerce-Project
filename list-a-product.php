<?php
    include 'db_connection.php';
?>

<?php
//TEMPLATES
    include 'templates/head.html';
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

<form class="form-horizontal">
<fieldset>

<legend class="h2 text-center p-10 text-primary">LIST A PRODUCT</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="seller_ID">SELLER ID</label>
  <div class="col-md-4">
  <input id="seller_ID" name="seller_ID" placeholder="SELLER ID" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_ID">PRODUCT ID</label>
  <div class="col-md-4">
  <input id="product_ID" name="product_ID" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">PRODUCT NAME</label>
  <div class="col-md-4">
  <input id="title" name="title" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="brand">BRAND</label>
  <div class="col-md-4">
  <input id="brand" name="brand" placeholder="BRAND" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="categories">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <select id="categories" name="categories" class="form-control">
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

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">
    <textarea id="description" name="description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" type="text"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="size">PRODUCT SIZE</label>
  <div class="col-md-4">
  <input id="size" name="size" placeholder="PRODUCT SIZE" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="weight">PRODUCT WEIGHT</label>
  <div class="col-md-4">
  <input id="weight" name="weight" placeholder="PRODUCT WEIGHT" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="quantity">AVAILABLE QUANTITY</label>
  <div class="col-md-4">
  <input id="quantity" name="quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="discount_percent">PERCENTAGE DISCOUNT</label>
  <div class="col-md-4">
  <input id="discount_percent" name="discount_percent" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">PRICE</label>
  <div class="col-md-4">
  <input id="price" name="price" placeholder="PRICE" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="online_date">LIST PRICE</label>
  <div class="col-md-4">
  <input id="list_price" name="list_price" placeholder="LIST PRICE" class="form-control input-md" required="" type="text">
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
  <label class="col-md-4 control-label" for="comment">COMMENT</label>
  <div class="col-md-4">
  <input id="comment" name="comment" placeholder="COMMENT" class="form-control input-md" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="create_date">CREATION DATE</label>
  <div class="col-md-4">
  <input id="create_date" name="create_date" placeholder="CREATION DATE" class="form-control input-md" required="" type="date">
  </div>
</div>

 <!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Main Image</label>
  <div class="col-md-4">
    <input id="image" name="image" class="input-file" type="file">
  </div>
</div>
<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="extraImage">Extra Images</label>
  <div class="col-md-4">
    <input id="extraImage" name="extraImage" class="input-file" type="file">
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
