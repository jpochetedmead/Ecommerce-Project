<!-- Create Listing -->
<?php //start php tag
//include db_connection.php page for database connection
include('db_connection.php');
?>

<?php
//TEMPLATES
    include 'templates/head.html';
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

<div class="find-product-container" id="w0">
<h1 class="title">Tell us what you're selling</h1>
<div id="w0-find-product">
  <div class="search-bar" id="w0-find-product-search-bar">
    <div class="textbox flex-wrapper">
      <div class="input-wrapper">
        <input autofocus="" type="text" class="find-product" placeholder="Enter UPC, ISBN, ePID, part number, or product name" role="combobox" aria-owns="w0-find-product-search-bar-autocomplete" aria-expanded="false" aria-autocomplete="list" autocomplete="off" maxlength="100" value="" id="w0-find-product-search-bar-search-field" data-w-onkeydown="checkKey|w0-find-product-search-bar">
        <span class="clipped" role="status" aria-live="polite" aria-atomic="true" id="w0-find-product-search-bar-search-bar-suggestions-count"></span>
      </div>
      <button class="btn btn--primary btn--large" disabled="" type="button" id="w0-find-product-search-bar-search-button" data-w-onclick="beforeSearch|w0-find-product-search-bar">Get started</button>
    </div>
  </div>
</div>
</div>

<div class="formfield">
<div class="formlabel">

<h1 class="title">Tell us what you're selling</h1>

<form name="listNewProduct" class="" action="newProduct.php" method="post" enctype="multipart/form-data">
  <div class="formcentered">
  <div class="formlabel">Product ID</div>
  <div class="formfield"><input type="text" name="productID"></div>
  <br class="clearfloat" />
  <div class="formlabel">Title</div>
  <div class="formfield"><input type="text" name="title" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Custom Label (SKU)</div>
  <div class="formfield"><input type="text" name="customLabel"></div>
  <br class="clearfloat" />
  <div class="formlabel">Category</div>
  <div class="formfield"><input type="text" name="Category" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Sub-Category</div>
  <div class="formfield"><input type="text" name="subCategory"></div>
  <br class="clearfloat" />
  <div class="formlabel">Condition</div>
  <div class="formfield"><input type="text" name="condition" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Photos</div>
  <div class="formfield"><input type="file" name="photos" accept=".jpeg,.jpg,.png" required></div>
  <br class="clearfloat" /><!-- Up to 6 Photos -->
  <div class="formlabel">Brand</div>
  <div class="formfield"><input type="text" name="brand"></div>
  <br class="clearfloat" />
  <div class="formlabel">Size Type</div>
  <div class="formfield"><input type="text" name="sizeType"></div>
  <br class="clearfloat" />
  <div class="formlabel">Description</div>
  <div class="formfield"><input type="text" name="description" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Price</div>
  <div class="formfield"><input type="number" name="price" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Quantity</div>
  <div class="formfield"><input type="number" name="quantity" required></div>
  <br class="clearfloat" />
  <div class="formlabel">Discount</div>
  <div class="formfield"><input type="number" name="discount"></div>
  <br class="clearfloat" />
  <div class="formlabel">Date Listed</div>
  <div class="formfield"><input type="date" name="dateListed"></div>
  <br class="clearfloat" />
  <p class="pagecentered"><input type="submit"></p>
  </div>
</form>

<?php
// if submit is not blanked i.e. it is clicked.
{
  $sql="insert into products(product_ID, title, price, list_price, brand, categories, image, description, featured, sizes, seller_ID, quantity, create_date, discount_percent)
  values ('".$_REQUEST['product_ID']."','".$_REQUEST['title']."','".$_REQUEST['price']."','".$_REQUEST['list_price']."','".$_REQUEST['brand']."','".$_REQUEST['categories']."','".$_REQUEST['image']."',
  '".$_REQUEST['description']."','".$_REQUEST['featured']."','".$_REQUEST['sizes']."','".$_REQUEST['seller_ID']."','".$_REQUEST['quantity']."','".$_REQUEST['create_date']."','".$_REQUEST['discount_percent']."');

  $res=mysql_query($sql);
  if($res){
    header('Location: newProduct-success.php');
  }
  else {
    header('Location: newProduct-problem.php');
  }
}

<?php // TEMPLATES
  include 'templates/footer.html';
?>
