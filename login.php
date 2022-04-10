<?php
    include 'db_connection.php';
?>

<?php
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
                Sign in to your account
              </h2>
            </div>
            <form class="mt-8 space-y-6" action="route.php" method="POST">
              <input type="hidden" name="remember" value="true">
              <div class="rounded-md shadow-sm -space-y-px">
                <div>
                  <label for="email" class="sr-only">Email address</label>
                  <input id="email" name="email" type="email" autocomplete="email" value="<?php echo isset($_GET['send']) ? $_GET['send'] : ' '?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                  <label for="password" class="sr-only">Password</label>
                  <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
                <?php
                  if($_GET['error'] == 1){
                    echo "<div class='text-red-500 text-center font-bold'>Email or password is incorrect</div>";
                  }
                ?>
              </div>
              <div class="text-sm">
                <a href="#" class="font-medium text-blue-600 hover:text-blue-400"> Forgot your password? </a>
              </div>
              <p>Don't have an account? <a href="register.php" class="text-blue-600 hover:text-blue-400">Register here.</a></p>
              <div class="flex justify-center">
                <button name='submit' type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Sign in
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

