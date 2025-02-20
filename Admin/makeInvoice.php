<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
// database connection
include('database/dbConnection.php');

// Update order status to "Shipped" if the Mark As Shipped button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_shipped"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info SET order_status = 'Shipped' WHERE invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}

// Update order status to "Completed" if the Mark As Completed button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_completed"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info SET order_status = 'Completed' WHERE invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}

// Update order status to "Canceled" if the Mark As Canceled button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_canceled"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info SET order_status = 'Canceled' WHERE invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}

//------------------- For order_info & payment_info table both -----------------------------

// Update order status to "Shipped" if the Mark As Shipped button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_shipped_both"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info, payment_info SET order_info.order_status = 'Shipped', payment_info.order_status = 'Shipped' WHERE order_info.invoice_no = '$invoice_no' AND payment_info.invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}

// Update order status to "Completed" if the Mark As Completed button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_completed_both"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info, payment_info SET order_info.order_status = 'Completed', payment_info.order_status = 'Completed' WHERE order_info.invoice_no = '$invoice_no' AND payment_info.invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}

// Update order status to "Canceled" if the Mark As Canceled button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mark_canceled_both"])) {
  $invoice_no = $_POST["invoice_no"];
  $sql_update = "UPDATE order_info, payment_info SET order_info.order_status = 'Canceled', payment_info.order_status = 'Canceled' WHERE order_info.invoice_no = '$invoice_no' AND payment_info.invoice_no = '$invoice_no'";
  if ($conn->query($sql_update) === TRUE) {
      $msg = "Order status updated successfully";
  } else {
      $msg = "Error updating record: " . $conn->error;
  }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
          <!-- START INVOICE AREA -->
          <!--------------------------->
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Invoice
              </h3>
            </div>
            <br><hr><br>
            <div class="row">
              <h1>Cash On Delivery</h1>
              <form class="form-group" action="#">
                <input type="search" name="search" id="search" placeholder="Search Invoice No" class="form-control">
              </form>
              <!-- Table Area -->
              <div style="overflow-y: auto;">
                <table class="table table-under-bordered">
                  <tbody>
                      <tr>
                        <th>Serial No</th>
                        <th>Invoice No</th>
                        <th>Order No</th>
                        <th>Order Status</th>
                        <th>Payment Method</th>
                        <th>Invoice List</th>
                        <th>Shipped</th>
                        <th>Completed</th>
                        <th>Canceled</th>
                      </tr>

                      <?php
                      // Fetch data from order_info table

                      // Grouping the same Invoice No at Order No Column
                      $sql = "SELECT invoice_no, GROUP_CONCAT(order_no ORDER BY order_no SEPARATOR ', ') as order_no, order_status, payment_method
                      FROM order_info
                      WHERE payment_method = 'Cash On Delivery' AND order_status != 'Pending'
                      GROUP BY invoice_no, order_status, payment_method";

                      $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          $count = 1;
                          while($row = $result->fetch_assoc()) {
                            if ($row["payment_method"] == "Cash On Delivery" && $row["order_status"] != "Pending") {
                              echo '<tr>
                                <td>' . $count . '</td>
                                <td>' . $row["invoice_no"] . '</td>
                                <td>' . $row["order_no"] . '</td>
                                <td class="text-success">' . $row["order_status"] . '</td>
                                <td>' . $row["payment_method"] . '</td>
                                <td><button onclick="window.location.href = \'invoice.php\'" class="btn btn-dark">See Invoice</button></td>

                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                        <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                        <button type="submit" name="mark_shipped" class="btn btn-success">Mark As Shipped</button>
                                    </form>
                                </td>
                                
                                <td>
                                  <form method="post" action="">
                                        <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                        <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                        <button type="submit" name="mark_completed" class="btn btn-success">Mark As Completed</button>
                                  </form>
                                </td>
                                <td>
                                  <form method="post" action="">
                                        <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                        <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                        <button type="submit" name="mark_canceled" class="btn btn-danger">Mark As Canceled</button>
                                  </form>
                                </td>
                              </tr>';
                              $count++;
                            }
                          }
                        } 
                      ?>

                      <!-- <tr>
                        <td>2</td>
                        <td>A7HBL83</td>
                        <td>110</td>
                        <td class="text-danger">Canceled</td>
                        <td>Cash On Delivery</td>
                        <td class="text-muted">Not Found</td>
                        <td class="text-muted">Not Available</td>
                        <td class="text-muted">Not Available</td>
                        <td class="text-muted">Not Available</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>AB2DY435</td>
                        <td>114</td>
                        <td class="text-success">Shipped</td>
                        <td>Cash On Delivery</td>
                        <td><button onclick="window.location.href = 'invoice.php'" class="btn btn-dark">See Invoice</button></td>
                        <td class="text-muted">Not Available</td>
                        <td><button class="btn btn-success">Mark As Completed</button></td>
                        <td><button class="btn btn-danger">Mark As Cancel</button></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>X2DY430</td>
                        <td>115</td>
                        <td class="text-success">Completed</td>
                        <td>Cash On Delivery</td>
                        <td><button onclick="window.location.href = 'invoice.php'" class="btn btn-dark">See Invoice</button></td>
                        <td class="text-muted">Not Available</td>
                        <td class="text-muted">Not Available</td>
                        <td class="text-muted">Not Available</td>
                      </tr> -->
                  </tbody>
               </table>
              </div>
            </div>
            <br><hr><br>
            <div class="row">
                <h1>Mobile Banking</h1>
                <form class="form-group" action="#">
                  <input type="search" name="search" id="search" placeholder="Search Invoice No" class="form-control">
                </form>
                <!-- Table Area -->
                <div style="overflow-y: auto;">
                  <table class="table table-under-bordered">
                    <tbody>
                        <tr>
                          <th>Serial No</th>
                          <th>Invoice No</th>
                          <th>Order No</th>
                          <th>Order Status</th>
                          <th>Payment Method</th>
                          <th>Invoice List</th>
                          <th>Shipped</th>
                          <th>Completed</th>
                          <th>Canceled</th>
                        </tr>
                        <!-- <tr>
                          <td>1</td>
                          <td>M7GB83IS</td>
                          <td>206, 207</td>
                          <td class="text-success">Processing</td>
                          <td>bKash</td>
                          <td><button onclick="window.location.href = 'invoice.php'" class="btn btn-dark">See Invoice</button></td>
                          <td><button class="btn btn-success">Mark As Shipped</button></td>
                          <td><button class="btn btn-success">Mark As Completed</button></td>
                          <td><button class="btn btn-danger">Mark As Cancel</button></td>
                        </tr> -->

                        <?php
                          // Query to retrieve data from payment_info table
                          $sql = "SELECT invoice_no, 
                          GROUP_CONCAT(CASE WHEN order_status != 'Pending' THEN order_no END SEPARATOR ', ') as order_no, 
                          serial_no, 
                          order_status, 
                          payment_method, 
                          acc_number, 
                          transaction_id, 
                          payment_date, 
                          payment_status 
                          FROM payment_info 
                          GROUP BY invoice_no";
                          $result = $conn->query($sql);

                          $count = 1;
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  if ($row["payment_status"] == "Paid") {
                                    echo "<tr>";
                                    echo "<td>" . $count . "</td>";
                                    echo "<td>" . $row["invoice_no"] . "</td>";
                                    echo "<td>" . $row["order_no"] . "</td>";
                                    echo "<td class='text-success'>" . $row["order_status"] . "</td>";
                                    echo "<td>" . $row["payment_method"] . "</td>";
                                    echo "<td><button onclick=\"window.location.href = 'invoice.php'\" class='btn btn-dark'>See Invoice</button></td>";
                                    echo '
                                        <td>
                                          <form method="post" action="">
                                              <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                              <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                              <button type="submit" name="mark_shipped_both" class="btn btn-success">Mark As Shipped</button>
                                          </form>
                                        </td>
                                    
                                        <td>
                                          <form method="post" action="">
                                                <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                                <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                                <button type="submit" name="mark_completed_both" class="btn btn-success">Mark As Completed</button>
                                          </form>
                                        </td>
                                        <td>
                                          <form method="post" action="">
                                                <input type="hidden" name="order_no" value="' . $row["order_no"] . '">
                                                <input type="hidden" name="invoice_no" value="' . $row["invoice_no"] . '">
                                                <button type="submit" name="mark_canceled_both" class="btn btn-danger">Mark As Canceled</button>
                                          </form>
                                        </td>';
                                    echo "</tr>";
                                    $count++;
                                  }
                              }
                          } 
                        ?>

                        <!-- <tr>
                          <td>2</td>
                          <td>YZ849MPI</td>
                          <td>320</td>
                          <td class="text-danger">Canceled</td>
                          <td>Upay</td>
                          <td class="text-muted">Not Found</td>
                          <td class="text-muted">Not Available</td>
                          <td class="text-muted">Not Available</td>
                          <td class="text-muted">Not Available</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>P749CHB93</td>
                          <td>214</td>
                          <td class="text-success">Shipped</td>
                          <td>bKash</td>
                          <td><button onclick="window.location.href = 'invoice.php'" class="btn btn-dark">See Invoice</button></td>
                          <td class="text-muted">Not Available</td>
                          <td><button class="btn btn-success">Mark As Completed</button></td>
                          <td><button class="btn btn-danger">Mark As Cancel</button></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>V749HFK2</td>
                          <td>215</td>
                          <td class="text-success">Completed</td>
                          <td>Rocket</td>
                          <td><button onclick="window.location.href = 'invoice.php'" class="btn btn-dark">See Invoice</button></td>
                          <td class="text-muted">Not Available</td>
                          <td class="text-muted">Not Available</td>
                          <td class="text-muted">Not Available</td>
                        </tr> -->
                    </tbody>
                 </table>
                </div>
            </div>
          </div>
          <!--------------------------->
          <!-- END INVOICE AREA -->
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
    <script src="js/main.js"></script>

  </body>
</html>