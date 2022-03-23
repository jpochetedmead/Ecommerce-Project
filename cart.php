<?php
    include 'db_connection.php';
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

<div id="forms">
  <form action="home.php" method="POST" id="logo">
    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwallpaperaccess.com%2Fskrillex-logo&psig=AOvVaw1sGiyQm4zClbiMB--ZRfxd&ust=1647090381536000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCLDjyfuPvvYCFQAAAAAdAAAAABAv" alt="logo">
  </form>
<form action="home.php" method="POST" id="form2">
  <input list="categories" name="category" placeholder="category">
  <datalist id="categories">
    <option value="1">
    <option value="2">
    <option value="3">
    <option value="4">
  </datalist>
  <input type="text" name="search" placeholder="search">
  <button type="submit" value="submit" id="productSearch">Search</button>
</form>

<form action="login.php" method="POST" id="form3">
  <button type="submit" value="signin"id="signin">Login</button>
</form>

<form action="register.php" method="POST" id="form4">
  <button type="submit" value="register">Sign up</button>
</form>

<form action="cart.php" method="POST" id="form5">
  <button type="submit" value="cart">Cart</button>
</form>
</div>

<?php
session_start();
if (isset($_SESSION['password']) && isset($_SESSION['email'])) {
?>
  <form action="home.php" method="POST" id="logo">
  <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwallpaperaccess.com%2Fskrillex-logo&psig=AOvVaw1sGiyQm4zClbiMB--ZRfxd&ust=1647090381536000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCLDjyfuPvvYCFQAAAAAdAAAAABAv" alt="logo">
  </form>

  <form action="home.php" method="POST" id="form2">
    <input list="categories" name="category" placeholder="category">
    <datalist id="categories">
      <option value="1">
      <option value="2">
      <option value="3">
      <option value="4">
    </datalist>
    <input type="text" name="search" placeholder="search">
    <button type="submit" value="submit" id="productSearch">Search</button>
  </form>

  <form action="logout.php" method="POST" id="form3">
    <button type="submit" value="logout" id="logout">Logout</button>
  </form>

  <form action="cart.php" method="POST" id="form5">
    <button type="submit" value="cart">Cart</button>
  </form>
<?php
}
?>

<div id="Cart">
<p>Your Cart is Empty</p>
<form action="login.php" method="POST" id="emptyCart">
  <button type="submit" value="signin"id="signin">Login</button>
</form>

<form action="cart.php" method="POST" id="emptyCart2">
  <button type="submit" value="register">Sign up</button>
</form>
</div>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
