<?php
include 'db_connection.php';
$error = 0;
if(isset($_POST['register'])){
  $sql = "SELECT * FROM Users WHERE email='$_POST[email]'";
  $result = $conn->query($sql);
  $sel = $result->fetch_assoc();
  if($sel['email'] == $_POST['email']){
    $error = 2;
  }
  if($_POST['role'] == 'seller'){
    if($_POST['state'] == '') $error = 3;
  }
  if($_POST['password'] != $_POST['conPassword']) $error = 1;
  if($error > 0){
    header("location:register.php?error=" . $error);
  }else{
    $id = rand(pow(10, 5-1), pow(10, 5)-1);
    while(true){
      $sql = "SELECT * FROM Users WHERE user_ID=$id";
      $result = $conn->query($sql);
      $sel = $result->fetch_assoc();
      if($sel['user_ID'] == $id){
        $id = rand(pow(10, 5-1), pow(10, 5)-1);
        continue;
      }else{
        break;
      }
    }
    if($_POST['role'] == 'buyer'){
      if(strlen($_POST['firstAddress'])>0 && strlen($_POST['city'])>0 && strlen($_POST['state'])>0 && $_POST['firstAddress']>0){
        $sql = "INSERT INTO Users (first_name,last_name,email,password,user_ID,role,address_first_line,address_second_line,city,state_abbreviation,zip_code,telephone_number,gender,approval)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'buyer','$_POST[firstAddress]','$_POST[secondAddress]','$_POST[city]','$_POST[state]',$_POST[zip],$_POST[phone],'$_POST[gender]',0)";
        if ($conn->query($sql) === TRUE) {
            //"echo New record created successfully";
        } else {
            //"echo Error: " . $sql . "<br>" . $conn->error;
        }
      }else{
        $sql = "INSERT INTO Users (first_name,last_name,email,password,user_ID,role,telephone_number,gender,approval)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'buyer',$_POST[phone],'$_POST[gender]',0)";
        if ($conn->query($sql) === TRUE) {
            //"echo New record created successfully";
        } else {
            //"echo Error: " . $sql . "<br>" . $conn->error;
        }
      }

    }elseif($_POST['role'] == 'seller'){
      $sql = "INSERT INTO Users (first_name,last_name,email,password,user_ID,role,address_first_line,address_second_line,city,state_abbreviation,zip_code,telephone_number,gender,approval)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'seller','$_POST[firstAddress]','$_POST[secondAddress]','$_POST[city]','$_POST[state]',$_POST[zip],$_POST[phone],'$_POST[gender]',0)";
        if ($conn->query($sql) === TRUE) {
            //"echo New record created successfully";
        } else {
            //"echo Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header("location:login.php");
  }
}
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    //include 'templates/nav-bar.php';
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
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex space-x-4">
              <h1 class="text-white">Ecommerce Project</h1>
            </div>
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="index.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</nav>
<div class="mx-auto mt-10">
  <div class="flex shadow-md my-10">
    <div class="w-full bg-white px-10 py-10">
      <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
          <div class="max-w-md w-full space-y-8">
              <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                  Register for an account
                </h2>
              </div>
              <?php
                if($_GET['error'] == 1) echo "<div class='text-red-500 text-center font-bold'>Password and confirm password do not match</div>";
                if($_GET['error'] == 2) echo "<div class='text-red-500 text-center font-bold'>Email already registered</div>";
                if($_GET['error'] == 3) echo "<div class='text-red-500 text-center font-bold'>State must be selected</div>";
              ?>
              <form class="mt-8 space-y-6" action="" method="POST">
                  <div class="rounded-md shadow-sm -space-y-px bg-gray-100 text-gray-900">
                        <div>
                          <label for="role"><b>Select a type of account</b></label>
                          <select name="role">
                            <option value="buyer" <?php if($_POST['role'] == 'buyer') echo "selected ";?>>Buyer</option>
                            <option value="seller" <?php if($_POST['role'] == 'seller') echo "selected ";?>>Seller</option>
                          </select>
                        </div>
                        <div class="flex justify-center pt-12">
                            <input value='Select Role' name='roleButton' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="fname"><b>First Name</b></label>
                            <input id="fname" name="fname" type="text" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <div>
                            <label for="lname"><b>Last Name</b></label>
                            <input id="lname" name="lname" type="text" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                        </div>
                        <div>
                            <label for="gender"><b>Gender</b></label>
                            <select id="gender" name="gender" <?php echo isset($_POST['role'])? '':'disabled'?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                            <option value="nothing">Ignore</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>
                        </div>
                        <div>
                            <label for="dob"><b>Date of Birth</b></label>
                            <input id="dob" name="dob" type="date" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <div>
                            <label for="phone"><b>Phone Number</b></label>
                            <input id="phone" name="phone" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="1234567890"><br>
                        </div>
                        <div>
                            <label for="firstAddress"><b>Address First Line</b></label>
                            <input id="firstAddress" name="firstAddress" <?php
                            if(isset($_POST['role'])){
                              if($_POST['role'] == 'seller'){
                                echo 'required';
                              }
                            }else{
                              echo 'disabled';
                            }
                            ?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                        </div>
                        <div>
                            <label for="secondAddress"><b>Address Second Line</b></label>
                            <input id="secondAddress" name="secondAddress" <?php
                              if(!isset($_POST['role'])) echo 'disabled';
                            ?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                        </div>
                        <div>
                            <label for="city"><b>City</b></label>
                            <input id="city" name="city" <?php
                            if(isset($_POST['role'])){
                              if($_POST['role'] == 'seller'){
                                echo 'required';
                              }
                            }else{
                              echo 'disabled';
                            }
                            ?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                        </div>
                        <div>
                            <label for="state"><b>State</b></label>
                            <select id="state" name="state" <?php
                            if(isset($_POST['role'])){
                              if($_POST['role'] == 'seller'){
                                echo 'required';
                              }
                            }else{
                              echo 'disabled';
                            }
                            ?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                              <option value="">---</option>
                              <option value="AL">Alabama</option>
                              <option value="AK">Alaska</option>
                              <option value="AZ">Arizona</option>
                              <option value="AR">Arkansas</option>
                              <option value="CA">California</option>
                              <option value="CO">Colorado</option>
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="DC">District Of Columbia</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="HI">Hawaii</option>
                              <option value="ID">Idaho</option>
                              <option value="IL">Illinois</option>
                              <option value="IN">Indiana</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NV">Nevada</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NM">New Mexico</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="ND">North Dakota</option>
                              <option value="OH">Ohio</option>
                              <option value="OK">Oklahoma</option>
                              <option value="OR">Oregon</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="SD">South Dakota</option>
                              <option value="TN">Tennessee</option>
                              <option value="TX">Texas</option>
                              <option value="UT">Utah</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WA">Washington</option>
                              <option value="WV">West Virginia</option>
                              <option value="WI">Wisconsin</option>
                              <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div>
                            <label for="zip"><b>Zipcode</b></label>
                            <input id="zip" name="zip" <?php
                            if(isset($_POST['role'])){
                              if($_POST['role'] == 'seller'){
                                echo 'required';
                              }
                            }else{
                              echo 'disabled';
                            }
                            ?> type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"><br>
                        </div>
                        <div>
                            <label for="email"><b>Email Address</b></label>
                            <input id="email" name="email" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="email" autocomplete="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <div>
                        </div>
                            <label for="password"><b>Password</b></label>
                            <input id="password" name="password" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" autocomplete="current-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <div>
                            <label for="conPassword"><b>Confirm Password</b></label>
                            <input id="conPassword" name="conPassword" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" autocomplete="current-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        </div>
                        <p>Already have an account? <a href="login.php" class="text-blue-600 hover:text-blue-400">Login here.</a></p>
                        <div class="flex justify-center pt-12">
                            <input value='Register' name='register' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
