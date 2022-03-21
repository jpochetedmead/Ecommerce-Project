<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Register</title>
</head>
<?php
include 'db_connection.php';
$error = 0;
$id = 0;
if(isset($_POST['register'])){
  if($_POST['role'] == 'buyer'){
    $sql = "SELECT * FROM Users WHERE email='$_POST[email]'";
    $result = $conn->query($sql);
    $sel = $result->fetch_assoc();
    if($sel['email'] == $_POST['email']){
      $error = 2;
    }
  }elseif($_POST['role'] == 'seller'){
    $sql = "SELECT * FROM Seller WHERE email='$_POST[email]'";
    $result = $conn->query($sql);
    $sel = $result->fetch_assoc();
    if($sel['email'] == $_POST['email']) $error = 2;
  }
  if($_POST['role'] == 'seller'){
    if($_POST['state'] == 'Nothing') $error = 3;
  }
  if($_POST['password'] != $_POST['conPassword']) $error = 1;
  if($error > 0){
    header("location:register.php?error=" . $error);
  }else{
    if($_POST['role'] == 'buyer'){
      if(strlen($_POST['firstAddress'])>0 && strlen($_POST['city'])>0 && strlen($_POST['state'])>0 && $_POST['firstAddress']>0){
        $sql = "INSERT INTO Users (first_name,last_name,email,password,user_ID,role,address_first_line,address_second_line,city,state_abbreviation,zip_code,telephone_number,gender)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'buyer','$_POST[firstAddress]','$_POST[secondAddress]','$_POST[city]','$_POST[state]',$_POST[zip],$_POST[phone],'$_POST[gender]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }else{
        $sql = "INSERT INTO Users (first_name,last_name,email,password,user_ID,role,telephone_number,gender)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'buyer',$_POST[phone],'$_POST[gender]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      
    }elseif($_POST['role'] == 'seller'){
      $sql = "INSERT INTO Seller (first_name,last_name,email,password,user_ID,role,address_first_line,address_second_line,city,state_abbreviation,zip_code,telephone_number,gender)
        VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$id,'buyer','$_POST[firstAddress]','$_POST[secondAddress]','$_POST[city]','$_POST[state]',$_POST[zip],$_POST[phone],'$_POST[gender]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  }
}

?>
<body class="h-full">
<nav class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex space-x-4">
              <h1 class="text-white">Ecommerce Project</h1>
            </div>
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="index.php" class="bg-gray-900 text-gray-300 hover:bg-blue-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</nav>
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
                    <input value='Select Role' name='roleButton' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                    <label for="password"><b>Password</b></label>
                    <input id="password" name="password" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" autocomplete="current-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                </div>
                <div>
                    <label for="conPassword"><b>Confirm Password</b></label>
                    <input id="conPassword" name="conPassword" <?php echo isset($_POST['role']) ? 'required':'disabled';?> type="password" autocomplete="current-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                </div>
                <p>Already have an account? <a href="login.php" class="text-blue-600 hover:text-blue-400">Login here.</a></p>
                <div class="flex justify-center pt-12">
                    <input value='Register' name='register' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
            </div>
        </form>
    </div>
</div>

<footer class="text-center lg:text-left bg-gray-100 text-gray-600">
  <div class="mx-6 py-10 text-center md:text-left">
    <div class="grid grid-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="">
        <h6 class="
            uppercase
            font-semibold
            mb-4
            flex
            items-center
            justify-center
            md:justify-start
          ">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cubes"
            class="w-4 mr-3" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M488.6 250.2L392 214V105.5c0-15-9.3-28.4-23.4-33.7l-100-37.5c-8.1-3.1-17.1-3.1-25.3 0l-100 37.5c-14.1 5.3-23.4 18.7-23.4 33.7V214l-96.6 36.2C9.3 255.5 0 268.9 0 283.9V394c0 13.6 7.7 26.1 19.9 32.2l100 50c10.1 5.1 22.1 5.1 32.2 0l103.9-52 103.9 52c10.1 5.1 22.1 5.1 32.2 0l100-50c12.2-6.1 19.9-18.6 19.9-32.2V283.9c0-15-9.3-28.4-23.4-33.7zM358 214.8l-85 31.9v-68.2l85-37v73.3zM154 104.1l102-38.2 102 38.2v.6l-102 41.4-102-41.4v-.6zm84 291.1l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6zm240 112l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6z">
            </path>
          </svg>
          CSET 2022
        </h6>
        <p>
          Capstone Project
        </p>
      </div>
      <div class="">
        <h6 class="uppercase font-semibold mb-4 flex justify-center md:justify-start">
          Useful links
        </h6>
        <p class="mb-4">
          <a href="#!" class="text-gray-600">About us</a>
        </p>
        <p class="mb-4">
          <a href="#!" class="text-gray-600">FAQ</a>
        </p>
      </div>
      <div class="">
        <h6 class="uppercase font-semibold mb-4 flex justify-center md:justify-start">
          Contact
        </h6>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path fill="currentColor"
              d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
            </path>
          </svg>
          Lancaster, PA, US
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
            </path>
          </svg>
          info@example.com
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
            </path>
          </svg>
          + 01 234 567 88
        </p>
        <p class="flex items-center justify-center md:justify-start">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z">
            </path>
          </svg>
          + 01 234 567 89
        </p>
      </div>
    </div>
  </div>
  <div class="text-center p-6 bg-gray-100">
    <span>© 2022 Copyright: CSET 2022</span>
  </div>
</footer>
</body>
</html>