<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include('database/dbConnection.php'); // Include database connection file


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $product_title = $_POST['product_title'];
  $product_price = $_POST['product_price'];
  $product_main_ctg_name = $_POST['product_main_ctg_name'];
  $product_sub_ctg_name = $_POST['product_sub_ctg_name'];
  $available_stock = $_POST['available_stock'];
  // $size_option = $_POST['size_option'];
  $size_option = "Default";
  $product_keyword = $_POST['product_keyword'];
  $product_description = $_POST['product_description'];
  
  // Image 1
  $file_name = $_FILES['product_img1']['name'];
  $tempname = $_FILES['product_img1']['tmp_name'];
  $folder = '../img/'.$file_name;

  // Image 2
  $file_name2 = $_FILES['product_img2']['name'];
  $tempname2 = $_FILES['product_img2']['tmp_name'];
  $folder2 = '../img/'.$file_name2;

  // Image 3
  $file_name3 = $_FILES['product_img3']['name'];
  $tempname3 = $_FILES['product_img3']['tmp_name'];
  $folder3 = '../img/'.$file_name3;

  // Image 4
  $file_name4 = $_FILES['product_img4']['name'];
  $tempname4 = $_FILES['product_img4']['tmp_name'];
  $folder4 = '../img/'.$file_name4;

  // Move the uploaded file to the desired folder
  
  if (move_uploaded_file($tempname, $folder) && move_uploaded_file($tempname2, $folder2) && move_uploaded_file($tempname3, $folder3) && move_uploaded_file($tempname4, $folder4)) {
      // Prepare the SQL query
      $query = "INSERT INTO product_info (product_title, product_price, main_ctg_name, sub_ctg_name, available_stock, size_option, product_keyword, product_description, product_img1, product_img2, product_img3, product_img4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
      $stmt = $conn->prepare($query);
      $stmt->bind_param("sdssisssssss", $product_title, $product_price, $product_main_ctg_name, $product_sub_ctg_name, $available_stock, $size_option, $product_keyword, $product_description, $file_name, $file_name2, $file_name3, $file_name4);

      // Execute the query
      if ($stmt->execute()) {
          echo "Product added successfully with image.";
      } else {
          echo "Error: " . $stmt->error;
      }

  } else {
      echo "Failed to upload image.";
  }
}
/* <?php if ($success_message): ?>
      <div class="alert alert-success">
      <?php echo $success_message; ?>
      </div>
    <?php endif; ?>
*/
?>
<!DOCTYPE html>
<html lang="en">
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

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/form.css">
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
          <!-- START ADD PRODUCT AREA -->
          <!--------------------------->
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Product
              </h3>
            </div>
            <br>
            <div class="row">
              <div class="form-container">
                <h1 class="text-center">Add Product</h1>
                <div class="content">
                    <!-- Product Add form -->
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="user-details full-input-box">
                        <!-- title -->
                        <div class="input-box">
                          <span class="details">Product Title</span>
                          <input name="product_title" type="text" placeholder="Enter your product title" required>
                        </div>
                        <!-- price -->
                        <div class="input-box">
                          <span class="details">Price</span>
                          <input name="product_price" type="text" placeholder="Enter your product price" required>
                        </div>
                        <!-- Main Category -->
                        <div class="input-box">
                          <span class="details">Choose Main Category</span>
                          <select id="main_ctg_name" name="product_main_ctg_name" required>
                            <option value="">Select Main Category</option>
                            <?php
                              // Fetch main categories from the database
                              $result = mysqli_query($conn, "SELECT main_ctg_name FROM main_category");
                              while ($row = mysqli_fetch_assoc($result)) {
                                $category_name = htmlspecialchars($row['main_ctg_name'], ENT_QUOTES, 'UTF-8');
                                  echo "<option value='$category_name'>$category_name</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <!-- Sub Category -->
                        <div class="input-box">
                          <span class="details">Choose Sub Category</span>
                          <select id="main_sub_name" name="product_sub_ctg_name" required>
                            <option value="">Select Sub Category</option>
                            <?php
                              // Fetch main categories from the database
                              $result = mysqli_query($conn, "SELECT sub_ctg_name FROM sub_category");
                              while ($row = mysqli_fetch_assoc($result)) {
                                $category_name = htmlspecialchars($row['sub_ctg_name'], ENT_QUOTES, 'UTF-8');
                                  echo "<option value='$category_name'>$category_name</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <!-- Total Stock -->
                        <div class="input-box">
                          <span class="details">Total Stock Amount</span>
                          <input name="available_stock" type="text" placeholder="Enter your total stock amount" required>
                        </div>
                        <!-- keyword -->
                        <div class="input-box">
                          <span class="details">Product Keyword</span>
                          <input name="product_keyword" type="text" placeholder="Enter your product keyword" required>
                        </div>
                        <!-- Description -->
                        <div class="input-box">
                          <span class="details">Description</span>
                          <input name="product_description" type="text" placeholder="Enter your product description" required>
                        </div>
                        <!-- Size -->
                        <!-- <span class="details">Product Available Size</span>
                        <div class="input-checkbox">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="S" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              S
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="M" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                              M
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="L" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                              L
                            </label>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="XL" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
                                XL
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="XXL" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
                                XXL
                              </label>
                            </div>
                          </div>
                        </div> -->
                        <!-- main image -->
                        <div>
                          <span class="details">Attach Primary Image</span>
                          <input type="file" name="product_img1" id="file" class="inputfile" required/><br>
                        </div>
                        <!-- image 2 -->
                        <div>
                          <span class="details">Attach Image 2</span>
                          <input type="file" name="product_img2" id="file" class="inputfile"/><br>
                        </div>
                        <!-- image 3 -->
                        <div>
                          <span class="details">Attach Image 3</span>
                          <input type="file" name="product_img3" id="file" class="inputfile"/><br>
                        </div>
                        <!-- image 4 -->
                        <div>
                          <span class="details">Attach Image 4</span>
                          <input type="file" name="product_img4" id="file" class="inputfile"/><br>
                        </div>
                      </div>
                      <!-- Submit button -->
                      <div class="button">
                        <input type="submit" value="Add Product">
                      </div>
                    </form>
                    
                </div>
              </div>
            </div>
          </div>
          <!--------------------------->
          <!-- END ADD PRODUCT AREA -->
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