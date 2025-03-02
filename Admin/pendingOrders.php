<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
// database connection
include('database/dbConnection.php');

// Update order status to "Processing" if the Accept button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept_order'])) {
  // Upddate order_info table
  $order_no = $_POST['order_no'];
  $update_sql = "UPDATE order_info SET order_status='Processing' WHERE order_no=?";
  $stmt = $conn->prepare($update_sql);
  $stmt->bind_param("i", $order_no);
  $stmt->execute();
  $stmt->close();

  // Update payment_info table
  $update_sql = "UPDATE payment_info SET order_status='Processing' WHERE order_no=?";
  $stmt = $conn->prepare($update_sql);
  $stmt->bind_param("i", $order_no);
  $stmt->execute();
  $stmt->close();
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
              <h1>Pending Orders</h1>
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
                      <th colspan="2">Action</th>
                    </tr>
                    
                    <?php
                      // Fetch data from order_info table
                      $sql = "SELECT order_no, user_id, user_phone, invoice_no, product_id, product_quantity, product_size, total_price, payment_method, order_date, order_status FROM order_info";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          if ($row["order_status"] == 'Pending') {
                                echo "<tr>
                                <td>$row[order_no]</td>
                                <td>$row[user_id]</td>
                                <td>$row[user_phone]</td>
                                <td>$row[invoice_no]</td>
                                <td>$row[product_id]</td>
                                <td>$row[product_size]</td>
                                <td>$row[product_quantity]</td>
                                <td>$row[total_price] Tk</td>
                                <td>$row[order_date]</td>
                                <td>$row[payment_method]</td>
                                <td class='text-primary'>$row[order_status]</td>
                                <td>
                                  <form method='post' action=''>
                                    <input type='hidden' name='order_no' value='$row[order_no]'>
                                    <button type='submit' name='accept_order' class='btn btn-dark'>Accept</button>
                                  </form>
                                </td>
                                <td>
                                  <a href='deleteOrder.php? o_n=$row[order_no]'>
                                    <button class='btn btn-danger' onclick='return checkDelete()'>Delete</button>
                                  </a>
                                </td>
                              </tr>";
                          }
                        }
                      }
                    ?>
                    
                  </tbody>
               </table>
              </div>
            </div>
            <br>
            <a href="#">
              <button class="btn btn-dark">Delete All Pending Orders <span class="mdi mdi-delete"></span></button>
            </a>
          </div>
          <!--------------------------->
          <!-- END VIEW ORDERS AREA -->
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