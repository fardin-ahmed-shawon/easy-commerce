<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
    exit();
}
// database connection
include 'database/dbConnection.php';

error_reporting(0);

// Database insertion
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

    // Generate a unique invoice number
    function generateInvoiceNo() {
        // Get the current timestamp in microseconds
        $timestamp = microtime(true) * 10000; // More digits by multiplying
        // Convert timestamp to a unique string
        $uniqueString = 'INV-' . strtoupper(base_convert($timestamp, 10, 36));
        return $uniqueString;
    }

    $invoice_no = generateInvoiceNo();

    if ($payment_method != "Cash On Delivery" && ($accNum == "" || $transactionID == "")) {
        // echo "Please Provide both Account Number and Transaction ID!";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="2; URL=checkout.php">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let msg_box = document.getElementById("msg");
                if (msg_box) {
                    msg_box.style.display = "block";
                    msg_box.innerText = "Please Provide both Account Number and Transaction ID!";
                    setTimeout(() => {
                        msg_box.style.display = "none";
                    }, 3000);
                }
            });
        </script>
        <?php
    } else {
        // Retrieve cart data from POST request
        $cartData = json_decode($_POST['cartData'], true);

        foreach ($cartData as $product) {
            $product_id = $product['id'];
            $product_title = $product['name'];
            $product_quantity = $product['quantity'];
            $product_size = isset($product['size']) ? $product['size'] : 'Default';
            $total_price = $product['price'] * $product_quantity;

            // Insert data into order_info table
            $sql = "INSERT INTO order_info (user_id, user_first_name, user_last_name, user_phone, user_email, user_address, city_address, invoice_no, product_id, product_title, product_quantity, product_size, total_price, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssssisisss", $user_id, $firstName, $lastName, $phone, $email, $address, $city, $invoice_no, $product_id, $product_title, $product_quantity, $product_size, $total_price, $payment_method);

            if ($stmt->execute()) {
                if ($payment_method != "Cash On Delivery") {
                    // Get the last inserted order number
                    $order_no = $conn->insert_id;

                    // Insert data into payment_info table
                    $sql_payment = "INSERT INTO payment_info (invoice_no, order_no, order_status, payment_method, acc_number, transaction_id, payment_status)
                    VALUES (?, ?, 'Pending', ?, ?, ?, 'Unpaid')";
                    $stmt_payment = $conn->prepare($sql_payment);
                    $stmt_payment->bind_param("sisss", $invoice_no, $order_no, $payment_method, $accNum, $transactionID);

                    $stmt_payment->execute();
                    $stmt_payment->close();
                }
            } else {
                $err_msg = "Order Not Placed!";
            }
            $stmt->close();
        }

        $conn->close();
        echo "Order Placed Successfully";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let success_msg = document.getElementById("success-msg");
                if (success_msg) {
                    success_msg.style.display = "block";
                    success_msg.innerText = "Order Placed Successfully!";
                    setTimeout(() => {
                        success_msg.style.display = "none";
                        window.location.href = "index.php";
                        // Clear the product list after placing the order
                        localStorage.clear();
                    }, 2000);
                }
            });
        </script>
        <?php
    }
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
        #msg {
            font-size: 25px;
            font-weight: 700;
            text-align: center;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-bottom: 3px solid #9c202c;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            display: none;
        }
        #success-msg {
            background-color: #d1e7dd;
            color: #0f5132;
            font-size: 25px;
            font-weight: 700;
            text-align: center;
            padding: 10px;
            border-bottom: 3px solid #0f5132;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            display: none;
        }
    </style>

</head>
<body>

<?php
// header file
include 'header.php';
// cart bar
include 'cartBar.php';
?>


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
                                                    <p>You need to send us Tk. <span class="text-danger send-amount"></span></p>
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
                                                    <p>You need to send us Tk. <span class="text-danger send-amount"></span></p>
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
                                                    <p>You need to send us Tk. <span class="text-danger send-amount"></span></p>
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
                                                    <p>You need to send us Tk.<span class="text-danger send-amount"></span></p>
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


<?php
// header file
include 'footer.php';
// cart bar
include 'bottomNavBar.php';
?>


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
            const send_amount = document.querySelectorAll('.send-amount');

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
            send_amount.forEach(element => {
                element.innerHTML = totalPriceContainer.textContent;
            });

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
                send_amount.forEach(element => {
                    element.innerHTML = totalPriceContainer.textContent;
                });
            }

        });
    

// Handle Payment Information Input Area -------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const paymentMethods = [
        { id: 'bKash', inputAreaId: 'bkash-input-area', accordionId: 'flush-collapseOne' },
        { id: 'nagad', inputAreaId: 'nagad-input-area', accordionId: 'flush-collapseTwo' },
        { id: 'rocket', inputAreaId: 'rocket-input-area', accordionId: 'flush-collapseThree' },
        { id: 'upay', inputAreaId: 'upay-input-area', accordionId: 'flush-collapseFour' }
    ];

    paymentMethods.forEach(method => {
        const radio = document.getElementById(method.id);
        const inputArea = document.getElementById(method.inputAreaId);
        const accordionButton = document.querySelector(`[data-bs-target="#${method.accordionId}"]`);
        const accordion = document.getElementById(method.accordionId);

        radio.addEventListener('change', function () {
            if (radio.checked) {
                inputArea.innerHTML = `
                    <div class="input-box">
                        <label for="${method.id}_accNum">Your ${method.id} Account Number</label>
                        <input name="accNum" class="form-control" id="${method.id}_accNum" type="text" placeholder="01XXXXXXXXX" required>
                    </div>
                    <br>
                    <div class="input-box">
                        <label for="${method.id}_transactionID">Your ${method.id} Transaction ID</label>
                        <input name="transactionID" class="form-control" id="${method.id}_transactionID" type="text" placeholder="Enter Transaction ID" required>
                    </div>
                `;
            } else {
                inputArea.innerHTML = '';
            }
        });

        accordionButton.addEventListener('click', function () {
            radio.checked = true;
            radio.dispatchEvent(new Event('change'));
        });

        const allAccordions = document.querySelectorAll('.accordion-collapse');
        allAccordions.forEach(acc => {
            acc.addEventListener('show.bs.collapse', function () {
                if (acc !== accordion) {
                    inputArea.innerHTML = '';
                }
            });
        });
    });

    // Clear input areas when "Cash On Delivery" is selected
    const codRadio = document.getElementById('cod');
    codRadio.addEventListener('change', function () {
        if (codRadio.checked) {
            paymentMethods.forEach(method => {
                const inputArea = document.getElementById(method.inputAreaId);
                inputArea.innerHTML = '';
            });
        }
    });
});
//-----------------------------------------------------------------------------------------


// Send product data from the localstora to the server
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const cartData = JSON.parse(localStorage.getItem('cartData')) || [];
        const formData = new FormData(form);

        // Add cart data to form data
        formData.append('cartData', JSON.stringify(cartData));

        // Send the form data to the server
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.body.innerHTML = data;
            localStorage.clear();
            window.location.href = "index.php";
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>

</body>
</html>