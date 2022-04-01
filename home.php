<?php
    include 'db_connection.php';
?>

<?php
session_start();
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.html';
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

    <!--Become a seller-->
    <div class="bg-gray-50">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Want to sell your own items?</span>
                <span class="block text-blue-800">Sign up to become a seller.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-blue-600"> Get started </a>
                </div>
            </div>
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
