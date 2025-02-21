<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
    exit();
}
// database connection
include 'database/dbConnection.php';

// Insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $payment_method = $_POST['payment_method'];
    $accNum = $_POST['accNum'];
    $transactionID = $_POST['transactionID'];

    // Assuming you have user_id in session
    $user_id = $_SESSION['id'];

    $product_id = 1;
    $product_title = "Default";
    $product_quantity = 2;
    $product_size = "Default";
    $total_price = 1000;

    // Generate a unique invoice number
    function generateInvoiceNo() {
        // Get the current timestamp in microseconds
        $timestamp = microtime(true) * 10000; // More digits by multiplying
        // Convert timestamp to a unique string
        $uniqueString = 'INV-' . strtoupper(base_convert($timestamp, 10, 36));
        return $uniqueString;
    }

    $invoice_no = generateInvoiceNo();
    
    // Insert data into order_info table
    $sql = "INSERT INTO order_info (user_id, user_first_name, user_last_name, user_phone, user_email, user_address, city_address, invoice_no, product_id, product_title, product_quantity, product_size, total_price, payment_method)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssisisss", $user_id, $firstName, $lastName, $phone, $email, $address, $city, $invoice_no, $product_id, $product_title, $product_quantity, $product_size, $total_price, $payment_method);

    if ($stmt->execute()) {
        // Get the last inserted order number
        $order_no = $conn->insert_id;

        // Insert data into payment_info table
        $sql_payment = "INSERT INTO payment_info (invoice_no, order_no, order_status, payment_method, acc_number, transaction_id, payment_status)
        VALUES (?, ?, 'Pending', ?, ?, ?, 'Unpaid')";
        $stmt_payment = $conn->prepare($sql_payment);
        $stmt_payment->bind_param("sisss", $invoice_no, $order_no, $payment_method, $accNum, $transactionID);

        $stmt_payment->execute();
        $stmt_payment->close();

        echo "Order and payment info placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Checkout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cartbar.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/checkout.css">

    <!--========== Remixicon ==========-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        /* Add custom styles to ensure radio buttons are displayed correctly */
        .radio-input-box input[type="radio"] {
            height: 15px;
            display: inline-block;
            margin-right: 5px;
        }

        .radio-input-box label {
            display: inline-block;
            margin-right: 15px;
        }
        .radio-input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
    </style>

</head>
<body>

<!--==================================-->
<!--========== START NAVBAR ==========-->
<!--==================================-->
<nav id="home">
    <div class="container">
        <!-- Middle -->
        <div class="inner">
            <!-- Mobile Menu Button -->
            <div class="mobile-menu" id="mobile-menu-btn">
                <a href="#" onclick="openMenuBtn()">
                    <i class="ri-menu-2-line"></i>
                </a>
            </div>

            <div class="logo">
            <a href="index.php"><span>Logo.</span></a>
            </div>

            <div class="search-area">
                <div class="search-row dropdown">
                    <i class="ri-search-line"></i>
                    <input id="input-box" type="text" autofocus required placeholder="Search Your Product Here" autocomplete="off">
                    <div class="search-suggestions">
                        <!-- Suggested Product List -->
                    </div>
                </div>
                <div class="mobile-search-area">
                    <i class="ri-search-line search-icon"></i>
                    <i class="ri-close-fill search-close-icon"></i>
                </div>
            </div>

            <div class="btn-area">

                <div class="call">
                    <i class="ri-phone-line"></i>
                    <div class="txt-area">
                        <p class="bold-title">Online Shopping</p>
                        <p class="gray-title">+8801944667441</p>
                    </div>
                </div>

                <div class="cart-btn">
                    
                    <div class="cart-container">
                        <div onclick="openCartBar()" class="cart-icon"><i class="ri-shopping-cart-2-line"></i></div>
                        <div class="cart-counter top-cart-counter">0</div>
                    </div>
                    
                    <div class="txt-area">
                        <p class="bold-title">Cart</p>
                        <p class="gray-title">Tk <span>0.00</span></p>
                    </div>
                </div>

                <div class="login-btn" onclick="window.location.href='registration.php'">
                    <i class="ri-user-line"></i>
                    <div class="txt-area">
                        <p class="bold-title">Account</p>
                        <p class="gray-title">Login/Signup</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="pages" id="pages">
            <div>
                <div class="hide-menu" id="mobile-menu-btn">
                    <br>
                    <a href="#" onclick="closeMenuBtn()">
                        <i class="ri-menu-3-line"></i>
                    </a>
                    <!-- Logo -->
                    <div>
                        <a href="index.php"><span class="bold-title">LOGO</span></a>
                    </div>
                </div>
                <hr>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(1)" class="dropdown-btn">Men's Fashion<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content1">
                                <a href="#">T-Shirt</a>
                                <a href="#">Shirt</a>
                                <a href="#">Jacket</a>
                                <a href="#">Pant</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(2)" class="dropdown-btn">Women's Fashion<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content2">
                                <a href="#">Tops</a>
                                <a href="#">Selowar Kamij</a>
                                <a href="#">Geans</a>
                                <a href="#">Bags</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(3)" class="dropdown-btn">Kids<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content3">
                                <a href="#">Kids item 1</a>
                                <a href="#">Kids item 2</a>
                                <a href="#">Kids item 3</a>
                                <a href="#">Kids item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(4)" class="dropdown-btn">Gadgets & Electronics<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content4">
                                <a href="#">Gadgets item 1</a>
                                <a href="#">Gadgets item 2</a>
                                <a href="#">Gadgetss item 3</a>
                                <a href="#">Gadgets item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(5)" class="dropdown-btn">Cosmetics<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content5">
                                <a href="#">Cosmetics item 1</a>
                                <a href="#">Cosmetics item 2</a>
                                <a href="#">Cosmetics item 3</a>
                                <a href="#">Cosmetics item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(6)" class="dropdown-btn">Health & Beauty<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content6">
                                <a href="#">Beauty item 1</a>
                                <a href="#">Beauty item 2</a>
                                <a href="#">Beauty item 3</a>
                                <a href="#">Beauty item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(7)" class="dropdown-btn">Home & Living<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content7">
                                <a href="#">Home item 1</a>
                                <a href="#">Home item 2</a>
                                <a href="#">Home item 3</a>
                                <a href="#">Home item 4</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button onclick="dropdownBtn(8)" class="dropdown-btn">Kitchen<i class="ri-arrow-down-s-line"></i></button>
                            <div class="content content8">
                                <a href="#">Kitchen item 1</a>
                                <a href="#">Kitchen item 2</a>
                                <a href="#">Kitchen item 3</a>
                                <a href="#">Kitchen item 4</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Search Bar For Mobile -->
        <div class="mobile-search-box">
            <input id="input-box-mobile" type="text" autofocus required placeholder="Search Your Product Here" autocomplete="off">
            <div class="search-suggestions-mobile">
                <!-- Suggested Product List -->
            </div>
        </div>
    </div>
</nav>
<!--==================================-->
<!--============ END NAVBAR ==========-->
<!--==================================-->



<!--====================================-->
<!--========== START CART BAR ==========-->
<!--====================================-->
<section class="cart">
    <div class="cls-btn-area text-end" onclick="closeCartBar()">
        <i class="ri-close-large-fill"></i>
    </div><br>
    <h2 class="cart-title">Your Cart</h2><hr>
    <div class="cart-content">
        <!-- Recreatable component -->
        <h2 style="border-radius: 10px;padding: 30px 0;background: var(--topback);" class="card cart-title">No Items Found</h2>
        <!-- End -->
    </div>
    <hr>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price text-end">Tk. 0</div>
    </div>
    <br>
    <div class="cart-bottom-button">
        <button onclick="window.location.href='checkout.php'" class="btn btn-dark btn-checkout">Checkout</button>
        <button onclick="window.location.href='viewCart.php';" class="btn btn-dark btn-cart">View Cart</button>
    </div>
</section>
<!--==================================-->
<!--========== END CART BAR ==========-->
<!--==================================-->



<!--==============================================-->
<!--============ START CHECKOUT SECTION ==========-->
<!--============================================-->
<section class="checkout py-5">
    <div class="container js-waypoint-sticky">
        <h1 class="text-center">Checkout</h1><hr><br>
        <br>
        <!-- Checkout Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="checkout-container">
                <!-- left area -->
                <div class="checkout">
                    <div class="title">Billing Address</div><br>
                    <div class="content">
                    <!-- input form -->
                        <div class="user-details full-input-box">
                            <!-- Input for First Name -->
                            <div class="input-box">
                                <span class="details">First Name<i class="text-danger">*</i></span>
                                <input name="firstName" type="text" placeholder="Enter your first name" required>
                            </div>
                            <!-- Input for Lasat Name -->
                            <div class="input-box">
                                <span class="details">Last Name<i class="text-danger">*</i></span>
                                <input name="lastName" type="text" placeholder="Enter your last name" required>
                            </div>
                            <!-- Input for phone number -->
                            <div class="input-box">
                                <span class="details">Phone Number<i class="text-danger">*</i></span>
                                <input name="phone" type="text" placeholder="Enter your number" required>
                            </div>
                            <!-- Input for email number -->
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input name="email" type="email" placeholder="Enter your email">
                            </div>
                            <!-- Input for address -->
                            <div class="input-box">
                                <span class="details">Address<i class="text-danger">*</i></span>
                                <input name="address" type="text" placeholder="Enter your address" required>
                            </div><br>
                            <!-- Input for city -->
                            <div class="radio-input-box">
                                <span class="details">Choose Your Delivery Location</span>
                                <input name="city" type="radio" id="dhaka" value="Inside Dhaka" checked>
                                <label for="dhaka">Inside Dhaka</label>
                                <br>
                                <input name="city" type="radio" id="outside" value="Outside Dhaka">
                                <label for="outside">Outside Dhaka</label>
                                <br><br>
                                <i>
                                    <p class="text-muted">* Delivery Charge Inside Dhaka 70 Tk.</p>
                                    <p class="text-muted">* Delivery Charge Outside Dhaka 130 Tk.</p>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right area -->
                <div class="order-info">
                    <div class="products-info">
                        <div class="title">Your Order</div>
                        <br>
                        <div class="order-list">
                            <div class="order-titles">
                                <h5>Products</h5>
                                <h5>Subtotal</h5>
                            </div><hr>
                            <div class="order-items" id="order-items">
                            <!-- Cart item will add dynamically -->
                            </div>
                            <hr>
                            <div class="subtotal">
                                <div class="subtotal-title">Subtotal</div>
                                <div class="subtotal-price amount" id="subtotal-price">Tk. 0</div>
                            </div><br>
                            <div class="shipping">
                                <div class="shipping-title">Shipping</div>
                                <div class="shipping-price amount" id="shipping-price">Tk. 0</div>
                            </div>
                            <hr>
                            <div class="total-product-price">
                                <div class="total-product-price-title">Total</div>
                                <div class="total-product-price-price amount" id="total-price">Tk. 0</div>
                            </div>
                        </div>
                    </div>
                    <!-- Bottom -->
                    <br>
                    <div class="payment-info">
                        <div class="title">Payment Method</div>
                        <br>
                            <div class="selection-box">
                                <p>Pay With Cash Upon Delivery</p>
                                <br>
                                <div class="radio-input-box">
                                    <input name="payment_method" type="radio" id="cod" value="Cash On Delivery" checked>
                                    <label for="cod">Cash On Delivery</label><br>
                                </div>
                            </div>
                            <div class="selection-box">
                                <p>Mobile Banking</p>
                                <br>
                                <!-- Accordian Start -->
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <!-- item 1-->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="document.getElementById('bKash').checked = true;">
                                                <div class="radio-input-box">
                                                    <input name="payment_method" type="radio" id="bKash" value="bKash">
                                                    <label for="bKash">bKash</label>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="payment-instructions">
                                                    <p>1. Go to your bKash app or dial *247#</p>
                                                    <p>2. Choose "Send Money"</p>
                                                    <p>3. Enter below bKash Account Number</p>
                                                    <p>4. Enter total amout</p>
                                                    <p>5. Now enter your bKash Account PIN to confirm the transaction</p>
                                                    <p>6. Copy Transaction ID from payment confirmation message and paste that Transaction ID below</p>
                                                    <br>
                                                    <p>You need to send us <span class="text-danger">Tk. 5600</span></p>
                                                    <br>
                                                    <p>Account Type: <span class="text-danger">Personal</span></p>
                                                    <p>Account Number: <span class="text-danger">01944667441</span></p>
                                                </div>
                                                <br>
                                                <!-- Input -->
                                                <div class="input-area" id="bkash-input-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item 2 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" onclick="document.getElementById('nagad').checked = true;">
                                                <div class="radio-input-box">
                                                    <input name="payment_method" type="radio" id="nagad" value="Nagad">
                                                    <label for="nagad">Nagad</label>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="payment-instructions">
                                                    <p>1. Go to your Nagad app or dial *XXX#</p>
                                                    <p>2. Choose "Send Money"</p>
                                                    <p>3. Enter below Nagad Account Number</p>
                                                    <p>4. Enter total amout</p>
                                                    <p>5. Now enter your Nagad Account PIN to confirm the transaction</p>
                                                    <p>6. Copy Transaction ID from payment confirmation message and paste that Transaction ID below</p>
                                                    <br>
                                                    <p>You need to send us <span class="text-danger">Tk. 5600</span></p>
                                                    <br>
                                                    <p>Account Type: <span class="text-danger">Personal</span></p>
                                                    <p>Account Number: <span class="text-danger">01944667441</span></p>
                                                </div><br>
                                                <!-- Input -->
                                                <div class="input-area" id="nagad-input-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item 3 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" onclick="document.getElementById('rocket').checked = true;">
                                                <div class="radio-input-box">
                                                    <input name="payment_method" type="radio" id="rocket" value="Rocket">
                                                    <label for="rocket">Rocket</label>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="payment-instructions">
                                                    <p>1. Go to your Rocket app or dial *XXX#</p>
                                                    <p>2. Choose "Send Money"</p>
                                                    <p>3. Enter below Rocket Account Number</p>
                                                    <p>4. Enter total amout</p>
                                                    <p>5. Now enter your Rocket Account PIN to confirm the transaction</p>
                                                    <p>6. Copy Transaction ID from payment confirmation message and paste that Transaction ID below</p>
                                                    <br>
                                                    <p>You need to send us <span class="text-danger">Tk. 5600</span></p>
                                                    <br>
                                                    <p>Account Type: <span class="text-danger">Personal</span></p>
                                                    <p>Account Number: <span class="text-danger">01944667441</span></p>
                                                </div><br>
                                                <!-- Input -->
                                                <div class="input-area" id="rocket-input-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item 4 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" onclick="document.getElementById('upay').checked = true;">
                                            <div class="radio-input-box">
                                                <input name="payment_method" type="radio" id="upay" value="Upay">
                                                <label for="upay">Upay</label>
                                            </div>
                                        </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="payment-instructions">
                                                    <p>1. Go to your Upay app or dial *XXX#</p>
                                                    <p>2. Choose "Send Money"</p>
                                                    <p>3. Enter below Upay Account Number</p>
                                                    <p>4. Enter total amout</p>
                                                    <p>5. Now enter your Upay Account PIN to confirm the transaction</p>
                                                    <p>6. Copy Transaction ID from payment confirmation message and paste that Transaction ID below</p>
                                                    <br>
                                                    <p>You need to send us <span class="text-danger">Tk. 5600</span></p>
                                                    <br>
                                                    <p>Account Type: <span class="text-danger">Personal</span></p>
                                                    <p>Account Number: <span class="text-danger">01944667441</span></p>
                                                </div><br>
                                                <!-- Input -->
                                                <div class="input-area" id="upay-input-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordian End -->
                            </div>
                            <br>
                            <div class="button">
                                <input class="btn btn-dark" type="submit" value="Place Order">
                            </div>
                        <br>
                    </div>
                </div>   
            </div>
        </form>
        <br><hr>
    </div>
</section>
<!--==============================================-->
<!--============ END CHECKOUT SECTION ==========-->
<!--============================================-->



<!--=============================================-->
<!--============ START FOOTER SECTION ==========-->
<!--=============================================-->
<footer class="pb-5">
    <div class="container footer-grid-container">
        <div class="business">
            <div class="logo">
                <a href="index.php"><span>Logo.</span></a>
            </div>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed id natus laboriosam autem nam magni corporis, itaque fuga deserunt provident.</p>
            <br>
            <p><i class="ri-mail-line"></i> <span>contact@example.com</span></p>
            <p><i class="ri-phone-line"></i> <span>+8801944667441</span></p>
            <p><i class="ri-map-pin-line"></i> <span>Dhanmondi, Dhaka, Bangladesh</span></p>
            <br>
            <div class="social-links">
                <a href="#">
                    <i class="ri-facebook-circle-fill"></i>
                </a>
                <a href="#">
                    <i class="ri-instagram-line"></i>
                </a>
                <a href="#">
                    <i class="ri-linkedin-box-fill"></i>
                </a>
                <a href="#">
                    <i class="ri-twitter-x-line"></i>
                </a>
            </div>
            <br>
            <p class="copyright">© 2025 Name. All rights reserved.</p>
        </div>
        <div class="about">
            <h6>about</h6>
            <br>
            <p><a href="#">About Us</a></p>
            <p><a href="#">Contact Us</a></p>
            <p><a href="#">Help Center</a></p>
            <p><a href="#">FAQ</a></p>
        </div>
        <div class="help">
            <h6>help & guide</h6>
            <br>
            <p><a href="#">Term Of Use</a></p>
            <p><a href="#">Privacy & Policy</a></p>
            <p><a href="#">Shipping & Delivery</a></p>
        </div>
        <div class="newsletter">
            <h6>newsletter</h6>
            <br>
            <p>Don't miss out thousands of great deals & promotions.</p>
            <br>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"><br>
                    <button type="submit" class="btn btn-danger">Subscribe</button>
            </form>
            <br><br><br>
            <p class="copyright">© 2025 Name. All rights reserved.</p>
        </div>
    </div>
</footer>
<!--=============================================-->
<!--============== END FOOTER SECTION= ==========-->
<!--=============================================-->



<!--==============================================-->
<!--============ START FIXED BOTTOM NAV ==========-->
<!--==============================================-->
<div class="bottom-nav-mobile">
    <div class="container">
        <ul>
            <li><a href="index.php">
                <i class="ri-home-4-line"></i>
                <p>Home</p>
            </a>
            </li>
            <li><a href="#" onclick="openMenuBtn()">
                <i class="ri-apps-line"></i>
                <p>Category</p>
            </a></li>
            <li><a href="#">
                <i class="ri-phone-line"></i>
                <p>Call</p>
            </a></li>
            <li><a href="#" onclick=" openCartBar()">
                <div class="cart-container">
                    <div class="cart-icon"><i class="ri-shopping-cart-2-line"></i></div>
                    <div class="cart-counter bottom-cart-counter">0</div>
                </div>
                <p>Cart</p>
            </a></li>
            <li><a href="registration.php">
                <i class="ri-user-line"></i>
                <p>Account</p>
            </a></li>
        </ul>
    </div>
</div>
<!--==============================================-->
<!--============ END FIXED BOTTOM NAV ============-->
<!--==============================================-->

<!-- Google Hosted Jquery --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--JQuery Plugins-->
<script src="js/jquery.waypoints.min.js"></script>

<!-- Main JS -->
<script src="js/mens.js"></script>
<script src="js/womens.js"></script>
<script src="js/main.js"></script>
<script src="js/cartCalculation.js"></script>
<script src="js/search.js"></script>

<script>
    function myFunction() {
    // Sticky Navbar
    $(document).ready(function () {
            $(".js-waypoint-sticky").waypoint(function (t) {
                "down" == t ? $("nav").addClass("sticky") : $("nav").removeClass("sticky");
            });
        });
    }

    function handleResize(event) {
        if (event.matches) {
            // The width matches the condition
            myFunction();
        } else {
            console.log("Device width does not match the condition.");
        }
    }

    // Define the device width condition
    const mediaQuery = window.matchMedia("(max-width: 1150px)"); // Example: max-width of 768px

    // Add an event listener to monitor changes in width
    mediaQuery.addEventListener("change", handleResize);

    // Run the function on initial load if the condition matches
    if (mediaQuery.matches) {
        myFunction();
    }

    // Cart item show from the Local Storage
        document.addEventListener('DOMContentLoaded', () => {
            const cartData = JSON.parse(localStorage.getItem('cartData')) || [];
            const orderItemsContainer = document.getElementById('order-items');
            const subtotalPriceContainer = document.getElementById('subtotal-price');
            const shippingPriceContainer = document.getElementById('shipping-price');
            const totalPriceContainer = document.getElementById('total-price');
            let subtotal = 0;

            let shipping_inside_dhaka = 70;
            let shipping_outside_dhaka = 130;
            let shipping = shipping_inside_dhaka; // default shipping cost is 70

            cartData.forEach(item => {
                const orderItem = document.createElement('div');
                orderItem.className = 'order-item';
                orderItem.innerHTML = `
                    <div class="order-product-info">
                        <div class="cart-box" id="${item.id}">
                            <img src="${item.image}" alt="cart-img">
                            <div class="cart-details">
                                <h2 class="cart-product-title">${item.name}</h2>
                                <!--
                                <h2 class="cart-product-title product-size">Size: XL</h2>
                                -->
                                <div class="cart-quantity">
                                    <button class="decrement" id="decrement">-</button>
                                    <span class="number">${item.quantity}</span>
                                    <button class="increment" id="increment">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-product-price amount">Tk. ${item.price * item.quantity}</div>
                `;
                subtotal += item.price * item.quantity;
                orderItemsContainer.appendChild(orderItem);
            });

            subtotalPriceContainer.textContent = `Tk. ${subtotal}`;
            shippingPriceContainer.textContent = `Tk. ${shipping}`;
            totalPriceContainer.textContent = `Tk. ${subtotal + shipping}`;

            // Add event listeners for increment and decrement buttons
            orderItemsContainer.addEventListener('click', (event) => {
                if (event.target.classList.contains('increment')) {
                    const cartBox = event.target.closest('.cart-box');
                    const quantitySpan = cartBox.querySelector('.number');
                    let quantity = parseInt(quantitySpan.textContent);
                    if (!isNaN(quantity)) {
                        quantity += 1;
                        quantitySpan.textContent = quantity;

                        // Update the quantity in the cartData array
                        const productId = cartBox.getAttribute('id');
                        const cartItem = cartData.find(item => item.id === productId);
                        if (cartItem) {
                            cartItem.quantity = quantity;
                            localStorage.setItem('cartData', JSON.stringify(cartData));
                        }

                        // Update the final price
                        const finalPrice = cartBox.closest('.order-item').querySelector('.order-product-price');
                        finalPrice.textContent = `Tk. ${cartItem.price * cartItem.quantity}`;

                        // Update the subtotal and total prices
                        updatePrices();
                    }
                }

                if (event.target.classList.contains('decrement')) {
                    const cartBox = event.target.closest('.cart-box');
                    const quantitySpan = cartBox.querySelector('.number');
                    let quantity = parseInt(quantitySpan.textContent);
                    if (!isNaN(quantity) && quantity > 1) {
                        quantity -= 1;
                        quantitySpan.textContent = quantity;

                        // Update the quantity in the cartData array
                        const productId = cartBox.getAttribute('id');
                        const cartItem = cartData.find(item => item.id === productId);
                        if (cartItem) {
                            cartItem.quantity = quantity;
                            localStorage.setItem('cartData', JSON.stringify(cartData));
                        }

                        // Update the final price
                        const finalPrice = cartBox.closest('.order-item').querySelector('.order-product-price');
                        finalPrice.textContent = `Tk. ${cartItem.price * cartItem.quantity}`;

                        // Update the subtotal and total prices
                        updatePrices();
                    }
                }
            });

            // Add event listeners for the radio buttons to update the shipping cost
            document.getElementById('dhaka').addEventListener('change', () => {
                shipping = shipping_inside_dhaka;
                shippingPriceContainer.innerHTML = shipping_inside_dhaka;
                updatePrices();
            });

            document.getElementById('outside').addEventListener('change', () => {
                shipping = shipping_outside_dhaka;
                shippingPriceContainer.innerHTML = shipping_outside_dhaka;
                updatePrices();
            });

            function updatePrices() {
                let newSubtotal = 0;
                cartData.forEach(item => {
                    newSubtotal += item.price * item.quantity;
                });
                subtotalPriceContainer.textContent = `Tk. ${newSubtotal}`;
                totalPriceContainer.textContent = `Tk. ${newSubtotal + shipping}`;
            }

        });
    

// Handle bKash input area-------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const bkashRadio = document.getElementById('bKash');
    const bkashInputArea = document.getElementById('bkash-input-area');
    const bkashAccordionButton = document.querySelector('[data-bs-target="#flush-collapseOne"]');
    const bkashAccordion = document.getElementById('flush-collapseOne');

    bkashRadio.addEventListener('change', function () {
        if (bkashRadio.checked) {
            bkashInputArea.innerHTML = `
                <div class="input-box">
                    <label for="t_num">Your bKash Account Number</label>
                    <input name="accNum" class="form-control" id="bKash_accNum" type="text" placeholder="01XXXXXXXXX" required>
                </div>
                <br>
                <div class="input-box">
                    <label for="t_id">Your bKash Transaction ID</label>
                    <input name="transactionID" class="form-control" id="bKash_transactionID" type="text" placeholder="Enter Transaction ID" required>
                </div>
            `;
        } else {
            bkashInputArea.innerHTML = '';
        }
    });

    // Handle accordion button click
    bkashAccordionButton.addEventListener('click', function () {
        bkashRadio.checked = true;
        bkashRadio.dispatchEvent(new Event('change'));
    });

    // Handle accordion collapse event
    bkashAccordion.addEventListener('hidden.bs.collapse', function () {
        bkashInputArea.innerHTML = '';
    });

    // Handle deselection of other radio buttons
    const otherRadios = document.querySelectorAll('input[name="payment_method"]:not(#bkash)');
    otherRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (!bkashRadio.checked) {
                bkashInputArea.innerHTML = '';
            }
        });
    });
});
//-------------------------------------------------------------------------------------------------------------------


// Handle Nagad input area--------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    // Handle Nagad input area
    const nagadRadio = document.getElementById('nagad');
    const nagadInputArea = document.getElementById('nagad-input-area');
    const nagadAccordionButton = document.querySelector('[data-bs-target="#flush-collapseTwo"]');
    const nagadAccordion = document.getElementById('flush-collapseTwo');

    nagadRadio.addEventListener('change', function () {
        if (nagadRadio.checked) {
            nagadInputArea.innerHTML = `
                <div class="input-box">
                    <label for="nagad_accNum">Your Nagad Account Number</label>
                    <input name="accNum" class="form-control" id="nagad_accNum" type="text" placeholder="01XXXXXXXXX" required>
                </div>
                <br>
                <div class="input-box">
                    <label for="nagad_transactionID">Your Nagad Transaction ID</label>
                    <input name="transactionID" class="form-control" id="nagad_transactionID" type="text" placeholder="Enter Transaction ID" required>
                </div>
            `;
        } else {
            nagadInputArea.innerHTML = '';
        }
    });

    // Handle accordion button click
    nagadAccordionButton.addEventListener('click', function () {
        nagadRadio.checked = true;
        nagadRadio.dispatchEvent(new Event('change'));
    });

    // Handle accordion collapse event
    nagadAccordion.addEventListener('hidden.bs.collapse', function () {
        nagadInputArea.innerHTML = '';
    });

    // Handle deselection of other radio buttons
    const otherRadios = document.querySelectorAll('input[name="payment_method"]:not(#nagad)');
    otherRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (!nagadRadio.checked) {
                nagadInputArea.innerHTML = '';
            }
        });
    });
});
//-------------------------------------------------------------------------------------------------------------------


// Handle Rocket input area------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    // Handle Rocket input area
    const rocketRadio = document.getElementById('rocket');
    const rocketInputArea = document.getElementById('rocket-input-area');
    const rocketAccordionButton = document.querySelector('[data-bs-target="#flush-collapseThree"]');
    const rocketAccordion = document.getElementById('flush-collapseThree');

    rocketRadio.addEventListener('change', function () {
        if (rocketRadio.checked) {
            rocketInputArea.innerHTML = `
                <div class="input-box">
                    <label for="rocket_accNum">Your Rocket Account Number</label>
                    <input name="accNum" class="form-control" id="rocket_accNum" type="text" placeholder="01XXXXXXXXX" required>
                </div>
                <br>
                <div class="input-box">
                    <label for="rocket_transactionID">Your Rocket Transaction ID</label>
                    <input name="transactionID" class="form-control" id="rocket_transactionID" type="text" placeholder="Enter Transaction ID" required>
                </div>
            `;
        } else {
            rocketInputArea.innerHTML = '';
        }
    });

    // Handle accordion button click
    rocketAccordionButton.addEventListener('click', function () {
        rocketRadio.checked = true;
        rocketRadio.dispatchEvent(new Event('change'));
    });

    // Handle accordion collapse event
    rocketAccordion.addEventListener('hidden.bs.collapse', function () {
        rocketInputArea.innerHTML = '';
    });

    // Handle deselection of other radio buttons
    const otherRadios = document.querySelectorAll('input[name="payment_method"]:not(#rocket)');
    otherRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (!rocketRadio.checked) {
                rocketInputArea.innerHTML = '';
            }
        });
    });
});
//--------------------------------------------------------------------------------------------------------------------


// Handle Upay input area--------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    // Handle Upay input area
    const upayRadio = document.getElementById('upay');
    const upayInputArea = document.getElementById('upay-input-area');
    const upayAccordionButton = document.querySelector('[data-bs-target="#flush-collapseFour"]');
    const upayAccordion = document.getElementById('flush-collapseFour');

    upayRadio.addEventListener('change', function () {
        if (upayRadio.checked) {
            upayInputArea.innerHTML = `
                <div class="input-box">
                    <label for="upay_accNum">Your Upay Account Number</label>
                    <input name="accNum" class="form-control" id="upay_accNum" type="text" placeholder="01XXXXXXXXX" required>
                </div>
                <br>
                <div class="input-box">
                    <label for="upay_transactionID">Your Upay Transaction ID</label>
                    <input name="transactionID" class="form-control" id="upay_transactionID" type="text" placeholder="Enter Transaction ID" required>
                </div>
            `;
        } else {
            upayInputArea.innerHTML = '';
        }
    });

    // Handle accordion button click
    upayAccordionButton.addEventListener('click', function () {
        upayRadio.checked = true;
        upayRadio.dispatchEvent(new Event('change'));
    });

    // Handle accordion collapse event
    upayAccordion.addEventListener('hidden.bs.collapse', function () {
        upayInputArea.innerHTML = '';
    });

    // Handle deselection of other radio buttons
    const otherRadios = document.querySelectorAll('input[name="payment_method"]:not(#upay)');
    otherRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (!upayRadio.checked) {
                upayInputArea.innerHTML = '';
            }
        });
    });
});
//-------------------------------------------------------------------------------------------------------------------


</script>

</body>
</html>