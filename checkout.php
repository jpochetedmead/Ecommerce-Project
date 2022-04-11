<?php
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet"/>

  <title>BuyMerca</title>
</head>
<body class="h-full">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="#" alt="" width="72" height="57">
      <h2>Checkout Form</h2>
      <p class="lead"></p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>

<main class="flex w-full">
    
<section class="w-full p-4">
        <div class="w-full text-md">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Cash Payments Only!!</h1>
                </div>
                <div <?php //hidden if empty ?>>
                    <div class="flex shadow-md my-10">
                        <div class="w-3/4 bg-white px-10 py-10">
                            <div class="flex justify-between border-b pb-8">
                                <h1 class="font-semibold">Shopping Cart</h1>
                                <h2 class="font-semibold"><?php //echo $totalQuantity ?> Items</h2>
                            </div>
                            <div class="flex mt-10 mb-5">
                                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                            </div>
                    

                            <div class='flex items-center hover:bg-gray-100 -mx-8 px-6 py-5'>
                                <div class='flex w-2/5'>
                                    <div class='w-20'>
                                        <img src='https://via.placeholder.com/150'alt='placeholder'>
                                    </div>
                                    <div class='flex flex-col justify-between ml-4 flex-grow'>
                                        <span class='font-bold text-sm'>Title</span>
                                        <span class='text-blue-500 text-xs'>Brand</span>
                                        <button form='form1' name='delete' type='submit' value='' class='font-semibold text-left hover:text-red-500 text-gray-500 text-xs'>Remove</button>
                                    </div>
                                </div>
                                <div class='flex justify-center w-1/5'>
                                    <button form='form1' name='minus' type='submit' value=''>-</button>

                                    <input class='mx-2 border text-center w-8' disabled type='text' value=''>

                                    <button form='form1' name='plus' type='submit' value=''>+</button>
                                </div>
                                <span class='text-center w-1/5 font-semibold text-sm'>Price</span>
                                <span class='text-center w-1/5 font-semibold text-sm'>total</span>
                            </div>

                        </div>

                        <div id="summary" class="w-1/4 px-8 py-10">
                            <h1 class="font-semibold border-b pb-8">Order Summary</h1>
                            <div class="flex justify-between mt-10 mb-5">
                                <span class="font-semibold text-sm">Items</span>
                                <span class="font-semibold text-sm"><?php //echo $totalQuantity ?></span>
                            </div>
                            <div class="border-t mt-8">
                                <div class="flex font-semibold justify-between py-6 text-sm">
                                    <span>Total cost</span>
                                    <span><?php //echo $totalPrice ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="order_confirmation.php" method="POST" class="w-2/3">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-5 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" name="first_name" id="first_name" value="<?php //echo $_SESSION['firstName'] ?>" autocomplete="given-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" name="last_name" id="last_name" value="<?php //echo $_SESSION['lastName'] ?>" autocomplete="family-name" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="text" name="email" id="email" value="<?php //echo $_SESSION['email'] ?>" autocomplete="email" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                        <label for="first_address" class="block text-sm font-medium text-gray-700">Street address 1st line</label>
                        <input type="text" name="first_address" id="first_address" value="<?php //echo $_SESSION['addressFirstLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                        <label for="second_address" class="block text-sm font-medium text-gray-700">Street address 2nd line</label>
                        <input type="text" name="second_address" id="second_address" value="<?php // echo $_SESSION['addressSecondLine'] ?>" autocomplete="street-address" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" value="<?php //echo $_SESSION['city'] ?>" autocomplete="address-level2" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="region" class="block text-sm font-medium text-gray-700">State</label>
                        <select id="region" name="region" type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            <option value="">---</option>
                            <option value="AL" <?php //if($_SESSION['state'] == 'AL') echo 'selected ' ?>>Alabama</option>
                            <option value="AK" <?php //if($_SESSION['state'] == 'AK') echo 'selected ' ?>>Alaska</option>
                            <option value="AZ" <?php //if($_SESSION['state'] == 'AZ') echo 'selected ' ?>>Arizona</option>
                            <option value="AR" <?php //if($_SESSION['state'] == 'AR') echo 'selected ' ?>>Arkansas</option>
                            <option value="CA" <?php //if($_SESSION['state'] == 'CA') echo 'selected ' ?>>California</option>
                            <option value="CO" <?php //if($_SESSION['state'] == 'CO') echo 'selected ' ?>>Colorado</option>
                            <option value="CT" <?php //if($_SESSION['state'] == 'CT') echo 'selected ' ?>>Connecticut</option>
                            <option value="DE" <?php //if($_SESSION['state'] == 'DE') echo 'selected ' ?>>Delaware</option>
                            <option value="DC" <?php //if($_SESSION['state'] == 'DC') echo 'selected ' ?>>District Of Columbia</option>
                            <option value="FL" <?php //if($_SESSION['state'] == 'FL') echo 'selected ' ?>>Florida</option>
                            <option value="GA" <?php //if($_SESSION['state'] == 'GA') echo 'selected ' ?>>Georgia</option>
                            <option value="HI" <?php //if($_SESSION['state'] == 'HI') echo 'selected ' ?>>Hawaii</option>
                            <option value="ID" <?php //if($_SESSION['state'] == 'ID') echo 'selected ' ?>>Idaho</option>
                            <option value="IL" <?php //if($_SESSION['state'] == 'IL') echo 'selected ' ?>>Illinois</option>
                            <option value="IN" <?php //if($_SESSION['state'] == 'IN') echo 'selected ' ?>>Indiana</option>
                            <option value="IA" <?php //if($_SESSION['state'] == 'IA') echo 'selected ' ?>>Iowa</option>
                            <option value="KS" <?php //if($_SESSION['state'] == 'KS') echo 'selected ' ?>>Kansas</option>
                            <option value="KY" <?php //if($_SESSION['state'] == 'KY') echo 'selected ' ?>>Kentucky</option>
                            <option value="LA" <?php //if($_SESSION['state'] == 'LA') echo 'selected ' ?>>Louisiana</option>
                            <option value="ME" <?php //if($_SESSION['state'] == 'ME') echo 'selected ' ?>>Maine</option>
                            <option value="MD" <?php //if($_SESSION['state'] == 'MD') echo 'selected ' ?>>Maryland</option>
                            <option value="MA" <?php //if($_SESSION['state'] == 'MA') echo 'selected ' ?>>Massachusetts</option>
                            <option value="MI" <?php //if($_SESSION['state'] == 'MI') echo 'selected ' ?>>Michigan</option>
                            <option value="MN" <?php //if($_SESSION['state'] == 'MN') echo 'selected ' ?>>Minnesota</option>
                            <option value="MS" <?php //if($_SESSION['state'] == 'MS') echo 'selected ' ?>>Mississippi</option>
                            <option value="MO" <?php //if($_SESSION['state'] == 'MO') echo 'selected ' ?>>Missouri</option>
                            <option value="MT" <?php //if($_SESSION['state'] == 'MT') echo 'selected ' ?>>Montana</option>
                            <option value="NE" <?php //if($_SESSION['state'] == 'NE') echo 'selected ' ?>>Nebraska</option>
                            <option value="NV" <?php //if($_SESSION['state'] == 'NV') echo 'selected ' ?>>Nevada</option>
                            <option value="NH" <?php //if($_SESSION['state'] == 'NH') echo 'selected ' ?>>New Hampshire</option>
                            <option value="NJ" <?php //if($_SESSION['state'] == 'NJ') echo 'selected ' ?>>New Jersey</option>
                            <option value="NM" <?php //if($_SESSION['state'] == 'NM') echo 'selected ' ?>>New Mexico</option>
                            <option value="NY" <?php //if($_SESSION['state'] == 'NY') echo 'selected ' ?>>New York</option>
                            <option value="NC" <?php //if($_SESSION['state'] == 'NC') echo 'selected ' ?>>North Carolina</option>
                            <option value="ND" <?php //if($_SESSION['state'] == 'ND') echo 'selected ' ?>>North Dakota</option>
                            <option value="OH" <?php //if($_SESSION['state'] == 'OH') echo 'selected ' ?>>Ohio</option>
                            <option value="OK" <?php //if($_SESSION['state'] == 'OK') echo 'selected ' ?>>Oklahoma</option>
                            <option value="OR" <?php //if($_SESSION['state'] == 'OR') echo 'selected ' ?>>Oregon</option>
                            <option value="PA" <?php //if($_SESSION['state'] == 'PA') echo 'selected ' ?>>Pennsylvania</option>
                            <option value="RI" <?php //if($_SESSION['state'] == 'RI') echo 'selected ' ?>>Rhode Island</option>
                            <option value="SC" <?php //if($_SESSION['state'] == 'SC') echo 'selected ' ?>>South Carolina</option>
                            <option value="SD" <?php //if($_SESSION['state'] == 'SD') echo 'selected ' ?>>South Dakota</option>
                            <option value="TN" <?php //if($_SESSION['state'] == 'TN') echo 'selected ' ?>>Tennessee</option>
                            <option value="TX" <?php //if($_SESSION['state'] == 'TX') echo 'selected ' ?>>Texas</option>
                            <option value="UT" <?php //if($_SESSION['state'] == 'UT') echo 'selected ' ?>>Utah</option>
                            <option value="VT" <?php //if($_SESSION['state'] == 'VT') echo 'selected ' ?>>Vermont</option>
                            <option value="VA" <?php //if($_SESSION['state'] == 'VA') echo 'selected ' ?>>Virginia</option>
                            <option value="WA" <?php //if($_SESSION['state'] == 'WA') echo 'selected ' ?>>Washington</option>
                            <option value="WV" <?php //if($_SESSION['state'] == 'WV') echo 'selected ' ?>>West Virginia</option>
                            <option value="WI" <?php //if($_SESSION['state'] == 'WI') echo 'selected ' ?>>Wisconsin</option>
                            <option value="WY" <?php //if($_SESSION['state'] == 'WY') echo 'selected ' ?>>Wyoming</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="zip" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                        <input type="text" name="zip" id="zip" value="<?php // echo $_SESSION['zip'] ?>" autocomplete="postal-code" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="flex justify-between px-4 py-3 bg-gray-50 sm:px-6">
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <select id="categories" name="categories" class="appearance-none rounded inline-flex justify-center block px-4 py-2 border border-gray-300 placeholder-gray-500 text-center text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="shipping">Shipping Method</option>
                        <option value="free">Free Shipping</option>
                    </select>
                </div>
                <div class="w-1/2">
                    <button name='submit' type="submit" class="rounded w-full bg-gray-900 font-semibold hover:bg-gray-700 py-3 text-sm text-white uppercase">Place Order</button>
                </div>
            </div>
        </div>
    </form>
</main>

<?php // TEMPLATES
  include 'templates/footer.html';
?>
