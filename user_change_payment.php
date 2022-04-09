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
    include 'templates/search-bar.php';
?>

<main class="flex w-full">
    <?php
    //TEMPLATES
        include 'templates/user-side-bar.php';
    ?>

    <section class="w-full p-4">
        <div class="w-1/2 text-md">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <h1 class="text-lg leading-6 font-medium text-gray-900">Cash Payments Only!!</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php // TEMPLATES
include 'templates/footer.html';
?>