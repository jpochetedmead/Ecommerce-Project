<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List of Accounts</title>
</head>
<?php     include 'db_connection.php';
?>
<div>
<form action="accountList.php" method="POST" id="form1">
  <label for="search">Search: </label>
  <input type="text" name="search"><br>
  <label for="category">Category: </label>
    <select name="category">
        <option value="ID">ID Number</option>
        <option value="name">Name</option>
	    <option value="buyer">All Buyers</option>
	    <option value="seller">All Sellers</option>
        <option value="moderator">All Moderators</option>
        <option value="admin">All Admins</option>

    </select><br>
  <button type="submit" value="search" id="search">Search</button>
</form>
</div>
<?php
if(isset($_POST['search'])){
    $sql ='';
    $sql2 = '';
    if($_POST['category'] == "ID"){
        $sql = "SELECT * FROM Users WHERE user_ID='$_POST[search]'";
        $sql2 = "SELECT * FROM Seller WHERE user_ID='$_POST[search]'";
    }
    elseif($_POST['category'] == "name"){
        $name = explode(" ", $_POST['search']);
        $fName = strtoupper($name[0]);
        $lName = strtoupper($name[1]);
        $sql = "SELECT * FROM Users WHERE upper(first_name)='$fName' || upper(last_name)='$lName' || upper(first_name)='$lName' || upper(last_name)='$fName'";
        $sql2 = "SELECT * FROM Seller WHERE upper(first_name)='$fName' || upper(last_name)='$lName' || upper(first_name)='$lName' || upper(last_name)='$fName'";
    }elseif($_POST['category'] == "buyer"){
        $sql = "SELECT * FROM Users WHERE upper(role)='BUYER'";
    }elseif($_POST['category'] == "seller"){
        $sql = "SELECT * FROM Seller";
    }elseif($_POST['category'] == "moderator"){
        $sql = "SELECT * FROM Users WHERE upper(role)='MODERATOR'";
    }elseif($_POST['category'] == "admin"){
        $sql = "SELECT * FROM Users WHERE upper(role)='ADMIN'";
    }

    $result = $conn->query($sql);
    $result2 = '';
    if($_POST['category'] == "ID" || $_POST['category'] == "name") $result2 = $conn->query($sql2);


    echo "<table width='30%' border=0>";

                echo "<th>Name</th>";
                echo "<th>ID</th>";
                echo "<th>Role</th>";
                echo "<th>Email</th>";

            echo "</tr>";

    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo strtoupper("<td>".$res['first_name']. " " . $res['last_name'] . "</td>");
        echo "<td>".$res['user_ID']."</td>";
        echo strtoupper("<td>".$res['role']."</td>");
        echo "<td>".$res['email']."</td>";
    }
    if($_POST['category'] == "ID" || $_POST['category'] == "name"){
        while($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo strtoupper("<td>".$row['first_name']. " " . $row['last_name'] . "</td>");
            echo "<td>".$row['user_ID']."</td>";
            echo "<td>SELLER</td>";
            echo "<td>".$row['email']."</td>";
        }
    }


    echo "</table>";
}
?>
