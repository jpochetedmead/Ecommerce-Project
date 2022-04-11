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
    include 'templates/nav-bar.php';
?>

<div class="w-full">
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
                    <div class="mt-10 sm:mt-0">
                        <div class="w-full">

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="role" class="block text-sm font-medium text-gray-700">Select type of account</label>
                                                <select name="role" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                                    <option value="buyer" <?php if($_POST['role'] == 'buyer') echo "selected ";?>>Buyer</option>
                                                    <option value="seller" <?php if($_POST['role'] == 'seller') echo "selected ";?>>Seller</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-4">
                                                <input value='Select Role' name='roleButton' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fname" class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input id="fname" name="fname" type="text" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="lname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input id="lname" name="lname" type="text" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                                <input id="email" name="email" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="email" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                <input id="phone" name="phone" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                                <select id="gender" name="gender" <?php echo isset($_POST['role'])? '':'disabled'?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                                    <option value="nothing">Ignore</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                                <input id="dob" name="dob" type="date" <?php echo isset($_POST['role']) ? 'required':'disabled';?> class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="firstAddress" class="block text-sm font-medium text-gray-700">Address First Line</label>
                                                <input id="firstAddress" name="firstAddress" <?php 
                                                if(isset($_POST['role'])){
                                                if($_POST['role'] == 'seller'){
                                                    echo 'required';
                                                }
                                                }else{
                                                echo 'disabled';
                                                }
                                                ?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>
                                            <div class="col-span-6">
                                                <label for="secondAddress" class="block text-sm font-medium text-gray-700">Address Second Line</label>
                                                <input id="secondAddress" name="secondAddress" <?php 
                                                if(!isset($_POST['role'])) echo 'disabled';
                                                ?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                <input id="city" name="city" <?php 
                                                if(isset($_POST['role'])){
                                                if($_POST['role'] == 'seller'){
                                                    echo 'required';
                                                }
                                                }else{
                                                echo 'disabled';
                                                }
                                                ?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                                <select id="state" name="state" <?php 
                                                if(isset($_POST['role'])){
                                                if($_POST['role'] == 'seller'){
                                                    echo 'required';
                                                }
                                                }else{
                                                echo 'disabled';
                                                }
                                                ?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
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

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="zip" class="block text-sm font-medium text-gray-700">Zip / Postal code</label>
                                                <input id="zip" name="zip" <?php 
                                                if(isset($_POST['role'])){
                                                if($_POST['role'] == 'seller'){
                                                    echo 'required';
                                                }
                                                }else{
                                                echo 'disabled';
                                                }
                                                ?> type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                                <input id="password" name="password" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="conPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                                <input id="conPassword" name="conPassword" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                        <p>Already have an account? <a href="login.php" class="text-blue-600 hover:text-blue-400">Login here.</a></p>
                                        <div class="flex justify-center pt-12">
                                            <input value='Register' name='register' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
