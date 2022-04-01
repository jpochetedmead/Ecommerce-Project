<?php
include 'db_connection.php';
session_start();

if(isset($_POST['register'])){
    if(strlen($_POST['secondAddress']) > 0){
        $sql = "UPDATE Users
        SET address_first_line='$_POST[firstAddress]', address_second_line='$_POST[secondAddress]', city='$_POST[city]', state_abbreviation='$_POST[state]', zip_code=$_POST[zip], role='seller'
        WHERE user_ID=$_SESSION[ID]";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        //echo $_SESSION['ID'] . "<br>";
        $sql = "UPDATE Users
        SET address_first_line='$_POST[firstAddress]', city='$_POST[city]', state_abbreviation='$_POST[state]', zip_code=$_POST[zip], role='seller'
        WHERE user_ID=$_SESSION[ID]";
        //echo $sql . "<br>";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header('location:home.php');
}
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

<form action="sellerRegistration.php" method="POST">
    <div>
        <label for="fname"><b>First Name</b></label>
        <input id="fname" name="fname" type="text" disabled value="<?php echo $_SESSION['firstName'] ?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
    </div>
    <div>
        <label for="lname"><b>Last Name</b></label>
        <input id="lname" name="lname" type="text" disabled value="<?php echo $_SESSION['lastName'] ?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
    </div>
    <div>
        <label for="ID"><b>ID Number</b></label>
        <input id="ID" name="ID" type="text" disabled value="<?php echo $_SESSION['ID'] ?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
    </div>
    <div>
        <label for="firstAddress"><b>Address First Line</b></label>
        <input id="firstAddress" name="firstAddress" required value="<?php echo $_SESSION['addressFirstLine'] ?>" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
    </div>
    <div>
        <label for="secondAddress"><b>Address Second Line</b></label>
        <input id="secondAddress" name="secondAddress" type="text" value="<?php echo $_SESSION['addressSecondLine'] ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
    </div>
    <div>
        <label for="city"><b>City</b></label>
        <input id="city" name="city" required type="text" value="<?php echo $_SESSION['city'] ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
    </div>
    <div>
        <label for="state"><b>State</b></label>
        <select id="state" name="state" required type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
            <option value="">---</option>
            <option value="AL" <?php if($_SESSION['state'] == 'AL') echo 'selected ' ?>>Alabama</option>
            <option value="AK" <?php if($_SESSION['state'] == 'AK') echo 'selected ' ?>>Alaska</option>
            <option value="AZ" <?php if($_SESSION['state'] == 'AZ') echo 'selected ' ?>>Arizona</option>
            <option value="AR" <?php if($_SESSION['state'] == 'AR') echo 'selected ' ?>>Arkansas</option>
            <option value="CA" <?php if($_SESSION['state'] == 'CA') echo 'selected ' ?>>California</option>
            <option value="CO" <?php if($_SESSION['state'] == 'CO') echo 'selected ' ?>>Colorado</option>
            <option value="CT" <?php if($_SESSION['state'] == 'CT') echo 'selected ' ?>>Connecticut</option>
            <option value="DE" <?php if($_SESSION['state'] == 'DE') echo 'selected ' ?>>Delaware</option>
            <option value="DC" <?php if($_SESSION['state'] == 'DC') echo 'selected ' ?>>District Of Columbia</option>
            <option value="FL" <?php if($_SESSION['state'] == 'FL') echo 'selected ' ?>>Florida</option>
            <option value="GA" <?php if($_SESSION['state'] == 'GA') echo 'selected ' ?>>Georgia</option>
            <option value="HI" <?php if($_SESSION['state'] == 'HI') echo 'selected ' ?>>Hawaii</option>
            <option value="ID" <?php if($_SESSION['state'] == 'ID') echo 'selected ' ?>>Idaho</option>
            <option value="IL" <?php if($_SESSION['state'] == 'IL') echo 'selected ' ?>>Illinois</option>
            <option value="IN" <?php if($_SESSION['state'] == 'IN') echo 'selected ' ?>>Indiana</option>
            <option value="IA" <?php if($_SESSION['state'] == 'IA') echo 'selected ' ?>>Iowa</option>
            <option value="KS" <?php if($_SESSION['state'] == 'KS') echo 'selected ' ?>>Kansas</option>
            <option value="KY" <?php if($_SESSION['state'] == 'KY') echo 'selected ' ?>>Kentucky</option>
            <option value="LA" <?php if($_SESSION['state'] == 'LA') echo 'selected ' ?>>Louisiana</option>
            <option value="ME" <?php if($_SESSION['state'] == 'ME') echo 'selected ' ?>>Maine</option>
            <option value="MD" <?php if($_SESSION['state'] == 'MD') echo 'selected ' ?>>Maryland</option>
            <option value="MA" <?php if($_SESSION['state'] == 'MA') echo 'selected ' ?>>Massachusetts</option>
            <option value="MI" <?php if($_SESSION['state'] == 'MI') echo 'selected ' ?>>Michigan</option>
            <option value="MN" <?php if($_SESSION['state'] == 'MN') echo 'selected ' ?>>Minnesota</option>
            <option value="MS" <?php if($_SESSION['state'] == 'MS') echo 'selected ' ?>>Mississippi</option>
            <option value="MO" <?php if($_SESSION['state'] == 'MO') echo 'selected ' ?>>Missouri</option>
            <option value="MT" <?php if($_SESSION['state'] == 'MT') echo 'selected ' ?>>Montana</option>
            <option value="NE" <?php if($_SESSION['state'] == 'NE') echo 'selected ' ?>>Nebraska</option>
            <option value="NV" <?php if($_SESSION['state'] == 'NV') echo 'selected ' ?>>Nevada</option>
            <option value="NH" <?php if($_SESSION['state'] == 'NH') echo 'selected ' ?>>New Hampshire</option>
            <option value="NJ" <?php if($_SESSION['state'] == 'NJ') echo 'selected ' ?>>New Jersey</option>
            <option value="NM" <?php if($_SESSION['state'] == 'NM') echo 'selected ' ?>>New Mexico</option>
            <option value="NY" <?php if($_SESSION['state'] == 'NY') echo 'selected ' ?>>New York</option>
            <option value="NC" <?php if($_SESSION['state'] == 'NC') echo 'selected ' ?>>North Carolina</option>
            <option value="ND" <?php if($_SESSION['state'] == 'ND') echo 'selected ' ?>>North Dakota</option>
            <option value="OH" <?php if($_SESSION['state'] == 'OH') echo 'selected ' ?>>Ohio</option>
            <option value="OK" <?php if($_SESSION['state'] == 'OK') echo 'selected ' ?>>Oklahoma</option>
            <option value="OR" <?php if($_SESSION['state'] == 'OR') echo 'selected ' ?>>Oregon</option>
            <option value="PA" <?php if($_SESSION['state'] == 'PA') echo 'selected ' ?>>Pennsylvania</option>
            <option value="RI" <?php if($_SESSION['state'] == 'RI') echo 'selected ' ?>>Rhode Island</option>
            <option value="SC" <?php if($_SESSION['state'] == 'SC') echo 'selected ' ?>>South Carolina</option>
            <option value="SD" <?php if($_SESSION['state'] == 'SD') echo 'selected ' ?>>South Dakota</option>
            <option value="TN" <?php if($_SESSION['state'] == 'TN') echo 'selected ' ?>>Tennessee</option>
            <option value="TX" <?php if($_SESSION['state'] == 'TX') echo 'selected ' ?>>Texas</option>
            <option value="UT" <?php if($_SESSION['state'] == 'UT') echo 'selected ' ?>>Utah</option>
            <option value="VT" <?php if($_SESSION['state'] == 'VT') echo 'selected ' ?>>Vermont</option>
            <option value="VA" <?php if($_SESSION['state'] == 'VA') echo 'selected ' ?>>Virginia</option>
            <option value="WA" <?php if($_SESSION['state'] == 'WA') echo 'selected ' ?>>Washington</option>
            <option value="WV" <?php if($_SESSION['state'] == 'WV') echo 'selected ' ?>>West Virginia</option>
            <option value="WI" <?php if($_SESSION['state'] == 'WI') echo 'selected ' ?>>Wisconsin</option>
            <option value="WY" <?php if($_SESSION['state'] == 'WY') echo 'selected ' ?>>Wyoming</option>
        </select>
    </div>
    <div>
        <label for="zip"><b>Zipcode</b></label>
        <input id="zip" name="zip" required type="text" value="<?php echo $_SESSION['zip'] ?>"class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
    </div>
    <div class="flex justify-center pt-12">
        <input value='Register' name='register' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    </div>
</form>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
