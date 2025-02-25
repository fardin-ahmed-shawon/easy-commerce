<?php
// database connection
include 'database/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cartbar.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/productList.css">

    <!--========== Remixicon ==========-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
                        <p class="gray-title"><span class="top-total-price">Tk 0.00</span></p>
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



<!--==========================================-->
<!--============ START HOME SECTION ==========-->
<!--==========================================-->

<div class="pb-5 js-waypoint-sticky">

    <!-- Carousel Slider Area -->
    <div class="img-carousel-area">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Info Area -->
    <div class="info-area">
        <div class="container">
            <div class="row py-5 d-none d-md-flex">
                <div class="col-md-3 text-center p-3">
                    <i class="info-icons fa-solid fa-hand-holding-dollar"></i>
                    <h5>Cash On Delivery</h5>
                    <p>COD in whole Bangladesh</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <i class="info-icons fa-solid fa-people-carry-box"></i>
                    <h5>Easy return</h5>
                    <p>Easy return facility for any problem</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <i class="info-icons fa-solid fa-truck"></i>
                    <h5>Fast Delivery</h5>
                    <p>Delivery in 1 day within Dhaka, 2 days outside Dhaka</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <i class="info-icons fa-solid fa-headset"></i>
                    <h5>24/7 Support</h5>
                    <p>24 hours live support at your service</p>
                  </div>
            </div>
        </div>
    </div>

    <!-- Category List Area -->
    <section class="category py-5 bg-gray1">
        <div class="container">
            <h1>Categories</h1>
            <p>Explore all the product categories</p>
            <br><br>

            <div class="grid-container">
                <div class="card category-card">
                    <!-- <img src="img/home2.jpg" class="card-img-top" alt="..."> -->
                    <div class="card-body"><br>
                        <h1>Men's Fashion</h1>
                        <a href="category.php">
                            <button class="btn">
                                <h1><i class="ri-arrow-right-s-line"></i></h1>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card category-card">
                    <!-- <img src="img/home2.jpg" class="card-img-top" alt="..."> -->
                    <div class="card-body"><br>
                        <h1>women's Fashion</h1>
                        <a href="category.php">
                            <button class="btn">
                                <h1><i class="ri-arrow-right-s-line"></i></h1>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrival Area -->
     <section class="new-arrival py-5">
        <div class="container">
            <div class="grid-container-2x">
                <div class="title-align-left">
                    <h1>New Arrival Products</h1>
                    <p>Explore all the new product</p>
                </div>
                <div class="btn-align-end">
                    <a href="category.php">
                        <button class="btn btn-dark btn-see-all">See All The Procuts <i class="ri-arrow-right-line"></i></button>
                    </a>
                </div>
            </div>
            <br><hr><br>
            <div class="grid-container new-arrival-products">
                <!-- All Product Card Will Add Here Dynamically -->
                <?php
                    $sql = "SELECT * FROM product_info";
                    $result = mysqli_query($conn, $sql);
                    
                    $products = array();
                    while ($item = mysqli_fetch_array($result)) {
                        echo "<div class='card' product-id='$item[product_id]' product-title='$item[product_title]' product-img='img/$item[product_img1]' product-price='$item[product_price]' product-quantity='1'>
                        <img src='img/$item[product_img1]' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h6>$item[product_title]</h6>
                            <p>$item[sub_ctg_name]</p>
                            <h6>Tk. $item[product_price]</h6>
                            <button onclick='addToCart(this)' class='btn btn-outline-dark'><span>Add to Cart</span> <i class='ri-shopping-bag-line'></i></button>
                            <button onclick='openProduct(\"$item[product_id]\")' class='btn btn-dark'><span>Order Now</span> <i class='ri-shopping-cart-2-line'></i></button>
                        </div>
                    </div>";
                    }
                ?>
            </div>
        </div>
     </section>

    <!-- Top Selling Product -->
    <section class="top-selling py-5 bg-gray1">
        <div class="container">
            <div class="grid-container-2x">
                <div class="title-align-left">
                    <h1>Top Selling Products</h1>
                    <p>Explore all the top selling product</p>
                </div>
                <div class="btn-align-end">
                    <a href="category.php">
                        <button class="btn btn-dark btn-see-all">See All The Procuts <i class="ri-arrow-right-line"></i></button>
                    </a>
                </div>
            </div>
            <br><hr><br>
            <div class="grid-container top-selling-products">
                <!-- All Product Card Will Add Here Dynamically -->
                <?php
                    $sql = "SELECT * FROM product_info";
                    $result = mysqli_query($conn, $sql);
                    
                    $products = array();
                    while ($item = mysqli_fetch_array($result)) {
                        echo "<div class='card' product-id='$item[product_id]' product-title='$item[product_title]' product-img='img/$item[product_img1]' product-price='$item[product_price]' product-quantity='1'>
                        <img src='img/$item[product_img1]' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h6>$item[product_title]</h6>
                            <p>$item[sub_ctg_name]</p>
                            <h6>Tk. $item[product_price]</h6>
                            <button onclick='addToCart(this)' class='btn btn-outline-dark'><span>Add to Cart</span> <i class='ri-shopping-bag-line'></i></button>
                            <button onclick='openProduct(\"$item[product_id]\")' class='btn btn-dark'><span>Order Now</span> <i class='ri-shopping-cart-2-line'></i></button>
                        </div>
                    </div>";
                    }
                ?>
            </div>
        </div>
    </section>
     
    <!--=====================================================-->
    <!--============= All Category List & Items =============-->
    <div class="all-categories">
        
        <!-- Men's Fashion -->
        <section class="py-5">
            <div class="container">
                <div class="grid-container-2x">
                    <div class="title-align-left">
                        <h1>Men's Fashion</h1>
                        <p>Explore all the men's product</p>
                    </div>
                    <div class="btn-align-end">
                        <button onclick="window.location.href='category.php';" class="btn btn-dark btn-see-all">See All The Procuts <i class="ri-arrow-right-line"></i></button>
                    </div>
                </div>
                <br><hr><br>
                <div class="grid-container home-mens-fashion-products">
                    <!-- All Product Card Will Add Here Dynamically -->
                    <?php
                    $sql = "SELECT * FROM product_info";
                    $result = mysqli_query($conn, $sql);
                    
                    $products = array();
                    while ($item = mysqli_fetch_array($result)) {
                        echo "<div class='card' product-id='$item[product_id]' product-title='$item[product_title]' product-img='img/$item[product_img1]' product-price='$item[product_price]' product-quantity='1'>
                        <img src='img/$item[product_img1]' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h6>$item[product_title]</h6>
                            <p>$item[sub_ctg_name]</p>
                            <h6>Tk. $item[product_price]</h6>
                            <button onclick='addToCart(this)' class='btn btn-outline-dark'><span>Add to Cart</span> <i class='ri-shopping-bag-line'></i></button>
                            <button onclick='openProduct(\"$item[product_id]\")' class='btn btn-dark'><span>Order Now</span> <i class='ri-shopping-cart-2-line'></i></button>
                        </div>
                    </div>";
                    }
                ?>
                </div>
            </div>
        </section>

        <!-- Women's Fashion -->
        <section class="py-5 bg-gray">
            <div class="container">
                <div class="grid-container-2x">
                    <div class="title-align-left">
                        <h1>Women's Fashion</h1>
                        <p>Explore all the women's product</p>
                    </div>
                    <div class="btn-align-end">
                        <a href="#">
                            <button  onclick="window.location.href='category.php';" class="btn btn-dark btn-see-all">See All The Procuts <i class="ri-arrow-right-line"></i></button>
                        </a>
                    </div>
                </div>
                <br><hr><br>
                <div class="grid-container home-womens-fashion-products">
                    <!-- All Product Card Will Add Here Dynamically -->
                    <?php
                    $sql = "SELECT * FROM product_info";
                    $result = mysqli_query($conn, $sql);
                    
                    $products = array();
                    while ($item = mysqli_fetch_array($result)) {
                        echo "<div class='card' product-id='$item[product_id]' product-title='$item[product_title]' product-img='img/$item[product_img1]' product-price='$item[product_price]' product-quantity='1'>
                        <img src='img/$item[product_img1]' class='card-img-top' alt='img'>
                        <div class='card-body'>
                            <h6>$item[product_title]</h6>
                            <p>$item[sub_ctg_name]</p>
                            <h6>Tk. $item[product_price]</h6>
                            <button onclick='addToCart(this)' class='btn btn-outline-dark'><span>Add to Cart</span> <i class='ri-shopping-bag-line'></i></button>
                            <button onclick='openProduct(\"$item[product_id]\")' class='btn btn-dark'><span>Order Now</span> <i class='ri-shopping-cart-2-line'></i></button>
                        </div>
                    </div>";
                    }
                ?>
                </div>
            </div>
        </section>
            
    </div>  
</div>
<!--==========================================-->
<!--============ END HOME SECTION ==========-->
<!--==========================================-->



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
<script src="js/main.js"></script>
<script src="js/cartCalculation.js"></script>
<script src="js/search.js"></script>

<script>
// Sticky Navbar
$(document).ready(function () {
    $(".js-waypoint-sticky").waypoint(function (t) {
        "down" == t ? $("nav").addClass("sticky") : $("nav").removeClass("sticky");
    });
});
</script>

</body>
</html>