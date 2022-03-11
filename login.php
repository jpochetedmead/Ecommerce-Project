<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Login</title>
</head>

<?php
    include 'db_connection.php';


?>


<body class="h-full">
  <nav class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <h1 class="text-white">Ecommerce Project</h1>
          <div>
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="#" class="bg-gray-900 text-gray-300 hover:bg-blue-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
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
            class="w-4 mr-3" role="img" xmlns="http://www.w3.org/2000/svg">
          </svg>
          CSET 2022
        </h6>
        <p>
          Capstone Project
        </p>
      </div>
      <div>
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
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg">
          </svg>
          Lancaster, PA, US
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg">
          </svg>
          info@example.com
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg">
          </svg>
          + 01 234 567 88
        </p>
        <p class="flex items-center justify-center md:justify-start">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg">
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