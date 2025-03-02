<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Category</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/productList.css">
    <link rel="stylesheet" href="css/cartbar.css">

    <!--========== Remixicon ==========-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body>

<?php
// header file
include 'header.php';
// cart bar
include 'cartBar.php';
?>


<!--==========================================-->
<!--============ START CATEGORY SECTION ==========-->
<!--==========================================-->
<div class="pb-5 js-waypoint-sticky">
    <!-- Men's Fashion -->
    <section class="py-5">
        <div class="container">
            <h1>Men's Fashion</h1>
            <p>Explore all the men's product</p>
            <br><br>
            <form class="form-group" action="#">
                <input type="search" name="search" id="searchBar" placeholder="Search Product..." class="form-control py-3">
            </form>
            <br>
        </div>
        <div class="bg-gray">
            <div class="container grid-container py-5 mens-fashion-products">
                <!-- Men's Product Will Add Automatically -->
                <?php
                    include 'database/dbConnection.php';

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
<!--==========================================-->
<!--============ END CATEGORY SECTION ==========-->
<!--==========================================-->


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
    // Sticky Navbar
    $(document).ready(function () {
        $(".js-waypoint-sticky").waypoint(function (t) {
            "down" == t ? $("nav").addClass("sticky") : $("nav").removeClass("sticky");
        });
    });
</script>

</body>
</html>