<?php
    include 'db_connection.php';
?>

<?php
session_start();
if (isset($_SESSION['ID'])) {
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
} else if (!isset($_SESSION['ID'])) {
?>
<div id="forms">
  <form action="home.php" method="POST" id="logo1">
    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwallpaperaccess.com%2Fskrillex-logo&psig=AOvVaw1sGiyQm4zClbiMB--ZRfxd&ust=1647090381536000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCLDjyfuPvvYCFQAAAAAdAAAAABAv" alt="logo">
  </form>
<form action="home.php" method="POST" id="form2-1">
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

<form action="login.php" method="POST" id="form3-1">
  <button type="submit" value="signin"id="signin">Login</button>
</form>

<form action="register.php" method="POST" id="form4-1">
  <button type="submit" value="register">Sign up</button>
</form>

<form action="cart.php" method="POST" id="form5-1">
  <button type="submit" value="cart">Cart</button>
</form>
</div>

<?php
}
?>

<a href="#">
<img src="https://target.scene7.com/is/image/Target/GUEST_5e9b06ce-0ae5-4945-a4a6-5254fcc6b9b5?wid=315&hei=315&qlt=60&fmt=pjpeg" alt="product1" width="250" height="250">
</a>

<a href="#">
<img src="https://n.nordstrommedia.com/id/e367d873-7eaa-4292-95fb-d3e4ad4c5377.jpeg?h=283&w=222" alt="product2" width="270" height="250">
</a>

<a href="#">
<img src="https://oldnavy.gapcanada.ca/Asset_Archive/ONWeb/content/0028/280/868/assets/211225_55-M6158_M_DP_T-Shirts.jpg" alt="product3" width="250" height="250">
</a>

<a href="#">
<img src="https://oldnavy.gapcanada.ca/Asset_Archive/ONWeb/content/0028/280/868/assets/211225_55-M6158_M_DP_Sweatshirtspants.jpg" alt="product4" width="250" height="250">
</a>

<a href="#">
<img src="https://target.scene7.com/is/image/Target/KA_Blender-200622-1592845868762?wid=315&hei=315&qlt=60&fmt=pjpeg" alt="product5" width="250" height="250">
</a>

<a href="#">
<img src="https://cdn.connox.com/m/100030/250627/media/Smeg/Kuechenmaschine/Smeg-Kuechenmaschine-SMF03-creme-Freisteller.jpg" alt="product6" width="250" height="250">
</a>


<footer>
<a href="about.php" id="About">About Us</a>
<a href="contact.php" id="contact">Contact Us</a>
<a href="policies.php" id="policies">Policies</a>
<a href="faqs.php" id="faq">FAQS</a>
</footer>
