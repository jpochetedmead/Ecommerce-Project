<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php // TEMPLATES
  include 'templates/head.html';
?>

  <nav class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <h1 class="text-white">Ecommerce Project</h1>
          <div>
            <div class="ml-10 flex items-baseline space-x-4">

              <a href="index.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>

              <?php
              if (isset($_SESSION['ID'])) {
              ?>
              <a href="logout.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log Out</a>
              <?php
            } else if(!isset($_SESSION['ID'])) {
              ?>
              <a href="login.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign In</a>

              <a href="register.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
              <?php
            }
              ?>
            </div>
          </div>
        </div>
        <div>
            <a href="cart.php" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                Cart
                <span></span>
            </a>
            <a href="#" class="bg-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">My Account</a>
        </div>
      </div>
    </div>
  </nav>

  <!--Search bar-->
    <div class="flex justify-center">
        <div class="mb-3 pt-6 xl:w-3/5">
            <form class="input-group relative flex flex-row items-stretch w-full mb-4">
                <select class="form-select appearance-none block w-1/6 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="0">All Products</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <input type="submit" id="button-addon2" value="Search" class="btn inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"></input>
            </form>
        </div>
    </div>

    <!--Popular Products-->
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Popular Products</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <!--Product 1-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 1
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 2-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 2
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 3-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 3
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 4-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 4
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <!--Product 5-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 5
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 6-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 6
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 7-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 7
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--Product 8-->
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://via.placeholder.com/150" alt="placeholder" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                                Product 8
                            </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php // TEMPLATES
include 'templates/footer.html';
?>

<?php
}
?>
