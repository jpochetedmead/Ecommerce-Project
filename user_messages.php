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
        <div class="w-full text-md">
            <div class="bg-white shadow sm:rounded">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-white p-8 rounded-md w-full">
                        <div class=" flex items-center justify-between pb-6">
                            <div>
                                <h2 class="text-gray-600 font-semibold">Messages</h2>
                            </div>
		                    <div class="flex items-center justify-between"></div>
                        </div>
                        <div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <!--Table Header-->
						                <thead>
							                <tr>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Name
								                </th>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									                Date
								                </th>
								                <th
									                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									                Subject
								                </th>
							                </tr>
						                </thead>
                                        <!--Table Body-->
                                        <tbody>
							                <tr>
                                                <!--Name of sender-->
								                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									                <div class="flex items-center">
											            <div class="ml-3">
												            <a href="newMessage.php" class="text-blue-500 hover:text-blue-300 whitespace-no-wrap">
                                                                Example name</a>
											            </div>
										            </div>
								                </td>
                                                <!--Date of message-->
								                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									                <p class="text-gray-900 whitespace-no-wrap">
                                                        Jan 21, 2020
									                </p>
								                </td>
                                                <!--Subject-->
								                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        Subject
									                </p>
								                </td>
							                </tr>
							                <tr>
								                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									                <div class="flex items-center">
											            <div class="ml-3">
												            <a href="#" class="text-blue-500 hover:text-blue-300 whitespace-no-wrap">
                                                                Example name</a>
											            </div>
										            </div>
								                </td>

								                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									                <p class="text-gray-900 whitespace-no-wrap">
										                Jan 01, 2020
									                </p>
								                </td>
                                                <td class="px-5 py-5 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        Subject
									                </p>
                                                </td>
							                </tr>
							
						                </tbody>
					                </table>
				                </div>
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