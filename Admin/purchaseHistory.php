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
      <?php include('navbar.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_sidebar.php -->
        <?php include('sidebar.php'); ?>
        <div class="main-panel">


          <!--------------------------->
          <!-- START PURCHASE HISTORY AREA -->
          <!--------------------------->
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Purchase History
              </h3>
            </div>
            <br>
            <div class="row">
              <h1>Purchase History</h1>
              <form class="form-group" action="#">
                <input type="search" name="search" id="search" placeholder="Search Order No" class="form-control">
              </form>
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
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>1000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Cash On Delivery</td>
                      <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>1000 Tk</td>
                      <td>12-2-2025</td>
                      <td>bKash</td>
                      <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>1000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Nagad</td>
                      <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>1000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Upay</td>
                      <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>27</td>
                      <td>01944667441</td>
                      <td>X2DY435</td>
                      <td>A37M</td>
                      <td>XXL</td>
                      <td>4</td>
                      <td>1000 Tk</td>
                      <td>12-2-2025</td>
                      <td>Rocket</td>
                      <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
               </table>
              </div>
            </div>
            <br>
              <a href="#">
                <button class="btn btn-dark">Delete All History <span class="mdi mdi-delete"></span></button>
              </a>
          </div>
          <!--------------------------->
          <!-- END PURCHASE HISTORY AREA -->
          <!--------------------------->


          <!-- partial:partials/_footer.php -->
          <?php include('footer.php'); ?>
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