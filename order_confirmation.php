<?php
    include 'db_connection.php';
    session_start();
?>

<?php
//TEMPLATES
    include 'templates/head.html';
    include 'templates/nav-bar.php';
    include 'templates/search-bar.php';
?>

<main class="flex flex-col w-full">
    <div class='px-4 py-5 sm:px-6 flex justify-center w-full'>
        <h2 class="font-semibold text-gray-900">Thank you! Your order has been confirmed!</h2>
    </div>
    <section class="w-full p-4">
      <div class="w-full text-md">
          <div class='bg-white shadow sm:rounded'>
            <div class='px-4 py-5 sm:px-6'>
              <h3 class='text-lg leading-6 font-medium text-gray-900'>Order number: </h3>
            </div>
            <div class='border-t border-gray-200'>
              <dl>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Full name</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>firstName lastName</dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Shipping address</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>addressFirstLine addressSecondLine city, state zip</dd>
                </div>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Items purchased</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>
                    <div>
                        <p>Your items</p>
                    </div>

                    </dd>
                </div>
                <div class='bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Total payment</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>Price </dd>
                </div>
                <div class='bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
                    <dt class='text-sm font-medium text-gray-500'>Status</dt>
                    <dd class='mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2'>Processing</dd>
                </div>
              </dl>
            </div>
          </div>
      </div>
    </section>

</main>


<?php // TEMPLATES
include 'templates/footer.html';
?>