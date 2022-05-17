<?php
include 'db_connection.php';
session_start();
$error = 0;
if(isset($_POST['submit'])){
  $sql = "SELECT * FROM Users WHERE email='$_POST[email]'";
  $result = $conn->query($sql);
  $sel = $result->fetch_assoc();
  if($sel['email'] != $_POST['email']){
    $error = 2;
  }else if($_POST['password'] != $_POST['conpassword']){
    $error = 1;
  }

  if($error == 0){
    $sql = "UPDATE Users SET password='$_POST[password]' WHERE email='$_POST[email]'";
    if ($conn->query($sql) === TRUE) {
      //echo "Record updated successfully";
      $error = 3;
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
?>
<div class="mx-auto mt-10">
    <div class="flex shadow-md my-10">
      <div class="w-full bg-white px-10 py-10">
        <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
          <div class="max-w-md w-full space-y-8">
            <div>
              <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Forgot your password?
              </h2>
              <?php
              if($error == 1){
              ?>
                <p class="mt-6 text-center font-bold text-red-600">Password and confirm password must match</p>
              <?php
              }elseif($error == 2){
              ?>
                <p class="mt-6 text-center font-bold text-red-600">Email is not registered</p>
              <?php
              }elseif($error == 3){
                ?>
                  <p class="mt-6 text-center font-bold text-green-600">Password changed!</p>
                <?php
                }
              ?>
            </div>
            <form class="mt-8 space-y-6" action="forgot_password.php" id="form1" method="POST">
              <input type="hidden" name="remember" value="true">
              <div class="rounded-md shadow-sm -space-y-px">
                <div>
                  <label for="email" class="sr-only">Email address</label>
                  <input id="email" name="email" required type="email" autocomplete="email" value="<?php echo isset($_GET['send']) ? $_GET['send'] : ' '?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                  <label for="password" class="sr-only">New password</label>
                  <input id="password" name="password" required type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="New password">
                </div>
                <div>
                  <label for="conpassword" class="sr-only">Confirm password</label>
                  <input id="conpassword" name="conpassword" required type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirm password">
                </div>
              </div>
              <p>Don't have an account? <a href="register.php" class="text-blue-600 hover:text-blue-400">Register here.</a></p>
              <div class="flex justify-center">
                <button name='submit' type="submit" form="form1" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Submit
                </button>
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