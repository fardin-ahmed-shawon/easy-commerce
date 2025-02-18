<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="index.php">
            <!-- <img src="assets/images/logo.svg" alt="logo" /> -->
            <span class="logo">LOGO</span>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="assets/images/logo-mini.svg" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Name</span>
                  <span class="text-secondary text-small">Product Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <span class="menu-title">Product</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="addProduct.php">Add Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="viewProduct.php">View Product</a>
                  </li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
                <span class="menu-title">Product Categories</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
              <div class="collapse" id="categories">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="insertCategory.php">Insert Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="viewCategory.php">View Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="deleteCategory.php">Delete Category</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="slider.php">
                <span class="menu-title">Slider</span>
                <i class="mdi mdi-menu-close menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="viewCustomers.php">
                <span class="menu-title">View Customers</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
                <span class="menu-title">View Orders</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pendingOrders.php">Pending Orders</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="viewOrders.php">Active Orders</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="viewPayments.php">
                <span class="menu-title">View Payments</span>
                <i class="mdi mdi-currency-usd menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="makeInvoice.php">
                <span class="menu-title">Make Invoice</span>
                <i class="mdi mdi-invoice-list-outline menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="purchaseHistory.php">
                <span class="menu-title">Purchase History</span>
                <i class="mdi mdi-history menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-logout menu-icon"></i>
              </a>
            </li>

          </ul>
        </nav>
        <div class="main-panel">


          <!--------------------------->
          <!-- START VIEW ORDERS AREA -->
          <!--------------------------->
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Orders
              </h3>
            </div>
            <br>
            <div class="row">
              <h1>Active Orders</h1>
              <form class="form-group" action="#">
                <input type="search" name="search" id="search" placeholder="Search Order No" class="form-control">
              </form>
              <!-- Table Area -->
              <div style="overflow-y: auto;">
                <table class="table table-under-bordered">
                  <tbody>
                    <tr>
                      <th>Order No</th>
                      <th>Customer ID</th>
                      <th>Customer Phone</th>
                      <th>Invoice No</th>
                      <th>Product ID</th>
                      <th>Size</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Order Date</th>
                      <th>Payment Method</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td>102</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A38NS</td>
                      <td>M</td>
                      <td>2</td>
                      <td>600 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-danger">Canceled</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>104</td>
                      <td>28</td>
                      <td>01944667225</td>
                      <td>X2DZA436</td>
                      <td>A35B</td>
                      <td>L</td>
                      <td>4</td>
                      <td>2000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>105</td>
                      <td>28</td>
                      <td>01944667225</td>
                      <td>X2DZA436</td>
                      <td>A31M</td>
                      <td>XL</td>
                      <td>3</td>
                      <td>1500 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>110</td>
                      <td>31</td>
                      <td>01714564267</td>
                      <td>A7HBL83</td>
                      <td>T48</td>
                      <td>S</td>
                      <td>1</td>
                      <td>900 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-danger">Canceled</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>114</td>
                      <td>35</td>
                      <td>01544677441</td>
                      <td>AB2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>3</td>
                      <td>1200 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-success">Shipped</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>115</td>
                      <td>40</td>
                      <td>01780667461</td>
                      <td>X2DY430</td>
                      <td>B35M</td>
                      <td>M</td>
                      <td>5</td>
                      <td>2500 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td class="text-success">Completed</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <!---->
                    <tr>
                      <td>202</td>
                      <td>127</td>
                      <td>01944667441</td>
                      <td>7X2DY435</td>
                      <td>A38NS</td>
                      <td>M</td>
                      <td>2</td>
                      <td>600 Tk</td>
                      <td>12-2-2025</td>
                      <td>bKash</td>
                      <td class="text-danger">Canceled</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>204</td>
                      <td>128</td>
                      <td>01944667225</td>
                      <td>U84HSNI9</td>
                      <td>A35B</td>
                      <td>L</td>
                      <td>4</td>
                      <td>2000 Tk</td>
                      <td>12-2-2025</td>
                      <td>bKash</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>205</td>
                      <td>128</td>
                      <td>01944667225</td>
                      <td>U84HSNI9</td>
                      <td>A31M</td>
                      <td>XL</td>
                      <td>3</td>
                      <td>1500 Tk</td>
                      <td>12-2-2025</td>
                      <td>bKash</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>210</td>
                      <td>171</td>
                      <td>01470364781</td>
                      <td>B7HBL83</td>
                      <td>T48</td>
                      <td>S</td>
                      <td>1</td>
                      <td>900 Tk</td>
                      <td>12-2-2025</td>
                      <td>Upay</td>
                      <td class="text-danger">Canceled</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>206</td>
                      <td>228</td>
                      <td>01714564267</td>
                      <td>M7GB83IS</td>
                      <td>A35B</td>
                      <td>L</td>
                      <td>4</td>
                      <td>2000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Nagad</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>207</td>
                      <td>228</td>
                      <td>01714564267</td>
                      <td>M7GB83IS</td>
                      <td>A31M</td>
                      <td>XL</td>
                      <td>3</td>
                      <td>1500 Tk</td>
                      <td>12-2-2025</td>
                      <td>Nagad</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>214</td>
                      <td>135</td>
                      <td>01544677441</td>
                      <td>P749CHB93</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>3</td>
                      <td>1200 Tk</td>
                      <td>12-2-2025</td>
                      <td>bKash</td>
                      <td class="text-success">Shipped</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>215</td>
                      <td>140</td>
                      <td>01780667461</td>
                      <td>V749HFK2</td>
                      <td>B35M</td>
                      <td>M</td>
                      <td>5</td>
                      <td>2500 Tk</td>
                      <td>12-2-2025</td>
                      <td>Rocket</td>
                      <td class="text-success">Completed</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>320</td>
                      <td>91</td>
                      <td>01714564267</td>
                      <td>YZ849MPI</td>
                      <td>B31M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>4000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Upay</td>
                      <td class="text-success">Processing</td>
                      <td>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                  </tbody>
               </table>
              </div>
            </div>
            <br>
            <a href="#">
              <button class="btn btn-dark">Delete All Active Orders <span class="mdi mdi-delete"></span></button>
            </a>
          </div>
          <!--------------------------->
          <!-- END VIEW ORDERS AREA -->
          <!--------------------------->


          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="#" target="_blank">Company Name</a>. All rights reserved.</span>
            </div>
          </footer>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- JS FILES  -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>


  </body>
</html>