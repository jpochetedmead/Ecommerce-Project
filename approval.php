<?php
    include 'db_connection.php';
    session_start();

    if(isset($_POST['accept'])){
        $sql = "UPDATE Users
        SET approval = 1
        WHERE user_ID=$_POST[accept]";

        //will eventually send message about accept

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }elseif(isset($_POST['decline'])){
        $sql = "UPDATE Users
        SET role = 'buyer'
        WHERE user_ID=$_POST[decline]";
        //Will eventually send message about decline

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<?php
//TEMPLATES
    include 'templates/head.html';
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

<nav class="bg-blue-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <h1 class="text-white">Ecommerce Project</h1>
        <div>
          <div class="ml-10 flex items-baseline space-x-4">

            <a href="adminHome.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
          </div>
        </div>
      </div>

      <div>
        <?php
        if (isset($_SESSION['ID'])) {
        ?>
        <a href="logout.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
        <?php
      }
        ?>
      </div>
    </div>
  </div>
</nav>

<main class="flex w-full h-screen">
    <aside class="w-80 h-screen bg-white shadow-md w-fulll">
        <div class="flex flex-col justify-between h-screen p-4 bg-white">
            <div class="text-sm">
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="buyerAccounts.php">Buyer Accounts</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="sellerAccounts.php">Seller Accounts</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="inventory.php">Inventory</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="editCategories.php">Edit Categories</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="approval.php">Account Approval</a>
                </div>
                <div class="bg-gray-900 text-white p-3 rounded mt-2 cursor-pointer hover:bg-gray-700 hover:text-blue-300 font-medium">
                    <a href="disabledAccounts.php">Disabled Accounts</a>
                </div>
            </div>
        </div>
    </aside>

<div class="m-5">
    <form action="approval.php" id="form1" method="POST">
    <table>
            <tr>
                <th>Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th>Select</th>
            </tr>

            <?php
            $sql = "SELECT * FROM Users WHERE role='seller' && approval=0";
            $result = $conn->query($sql);

            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $res['first_name'] . " " . $res['last_name'] . "</td>";
                echo "<td>" . $res['user_ID'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";
                ?>
                <td><button type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['user_ID']?>">✅</button>
                <button type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['user_ID']?>">❌</button></td>
                <?php
            }
            ?>

        </table>
        </form>
</div>
