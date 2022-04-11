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
<!-- Product page -->
<main class="flex w-full">

    <!--Display products-->
    <section class="w-full p-4">
        <div class="w-full">
            <div class="px-10 py-20 bg-white">
                <!--Distplay products below-->
                <div class="pt-6">
                    <!--Images-->
                        <div class="flex-shrink-0 flex justify-center">
                            <div x-data="photoGalleryApp" class="max-w-xl flex flex-col">
                                <div class="flex items-center sm:h-80">
                                    <div :class="{'cursor-not-allowed opacity-50': ! hasPrevious()}"  class="hidden sm:block cursor-pointer">
                                        <svg version="1.0" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" class="h-8" x-on:click="previousPhoto()">
                                            <path d="m42.166 55.31-24.332-25.31 24.332-25.31v50.62z" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.125"/>
                                        </svg>
                                    </div>
                                    <div class="w-full sm:w-108 flex justify-center">
                                        <img x-ref="mainImage" class="w-full sm:w-auto sm:h-80" src="" loading="lazy" />
                                    </div>
                                    <div :class="{'cursor-not-allowed opacity-50': ! hasNext()}"  class="hidden sm:block cursor-pointer">
                                        <svg version="1.0" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" class="h-8" x-on:click="nextPhoto()">
                                            <path d="m17.834 55.31 24.332-25.31-24.332-25.31v50.62z" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.125"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex justify-center mt-1 space-x-1">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/58049699/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 0}" class="h-16 w-16" x-on:click="pickPhoto(0)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/100821385/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 1}" class="h-16 w-16" x-on:click="pickPhoto(1)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/75873313/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 2}" class="h-16 w-16" x-on:click="pickPhoto(2)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/65267550/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 3}" class="h-16 w-16" x-on:click="pickPhoto(3)">
                                    <img src="https://inaturalist-open-data.s3.amazonaws.com/photos/58914463/square.jpg" :class="{'ring-2 opacity-50': currentPhoto == 4}" class="h-16 w-16" x-on:click="pickPhoto(4)">
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('photoGalleryApp', () => ({
                                currentPhoto: 0,
                                photos: [
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/58049699/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/100821385/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/75873313/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/65267550/medium.jpg",
                                    "https://inaturalist-open-data.s3.amazonaws.com/photos/58914463/medium.jpg"
                                ],
                                init() { this.changePhoto(); },
                                nextPhoto() {
                                    if ( this.hasNext() ) {
                                        this.currentPhoto++;
                                        this.changePhoto();
                                    }
                                },
                                previousPhoto() {
                                    if ( this.hasPrevious() ) {
                                        this.currentPhoto--;
                                        this.changePhoto();
                                    }
                                },
                                changePhoto() {
                                    this.$refs.mainImage.src = this.photos[this.currentPhoto];
                                },
                                pickPhoto(index) {
                                    this.currentPhoto = index;
                                    this.changePhoto();
                                },
                                hasPrevious() {
                                    return this.currentPhoto > 0;
                                },
                                hasNext() {
                                    return this.photos.length > (this.currentPhoto + 1);
                                }
                                }))
                            })
                        </script>

                    <!-- Product info -->
                    <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Product Title</h1>
                    </div>

                     <!--details-->
                    <aside class="mt-4 lg:mt-0 lg:row-span-3">
                        <h2 class="text-gray-900">Price</h2>
                        <p class="text-3xl text-gray-900">$192</p>

                        <form class="mt-10">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity / Available: </label>
                            <input required type="text" id="quantity" name="quantity" class="appearance-none rounded relative block w-1/6 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">

                        <div class="w-80 bg-white shadow-md w-fulll">
                            <div class="flex flex-col justify-between p-4 bg-white">
                                <div class="text-sm">
                                    <!--Category or whatever we want-->
                                    <div class="border-b border-gray-200 py-6">
                                        <h3 class="-my-3 flow-root">
                                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                            <span class="font-medium text-gray-900">Category</span>
                                        </div>
                                        </h3>
                                        <!-- Display one
                                        <div class="pt-6" id="filter-section-1">
                                            <div class="space-y-4">
                                                <div class="flex items-center">
                                                    <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New Arrivals </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600"> Organization </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories </label>
                                                </div>
                                            </div>
                                        </div>
                                            -->
                                    </div>
                                    <!--Brand or whatever we want-->
                                    <div class="border-b border-gray-200 py-6">
                                        <h3 class="-my-3 flow-root">
                                        <div class="py-3 bg-white w-full flex items-center justify-between text-sm">
                                            <span class="font-medium text-gray-900">Brand</span>
                                        </div>
                                        </h3>
                                        <!--Display one
                                        <div class="pt-6" id="filter-section-1">
                                            <div class="space-y-4">
                                                <div class="flex items-center">
                                                    <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New Arrivals </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-2" name="category[]" value="travel" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-3" class="ml-3 text-sm text-gray-600"> Organization </label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories </label>
                                                </div>
                                            </div>
                                        </div>
                                            -->
                                    </div>
                                    
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-10 w-1/2 bg-gray-900 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to Cart</button>
                        </form>
                        </aside>

                    <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                        <!-- Description and details -->
                        <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900">The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: &quot;Black&quot;. Need to add an extra pop of color to your outfit? Our white tee has you covered.</p>
                        </div>
                        </div>
                        <!--
                        <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

                        <div class="mt-4">
                            <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                            <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
                            </ul>
                        </div>
                        </div>
                        -->
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