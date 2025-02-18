<?php
header('Content-Type: application/json');
include 'database/dbConnection.php';

$sql = "SELECT * FROM product_info";
$result = mysqli_query($conn, $sql);

$products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = array(
        "id" => $row['product_id'],
        "title" => $row['product_title'],
        "description" => $row['product_description'],
        "price" => $row['product_price'],
        "main_category" => $row['product_main_ctg_name'],
        "sub_category" => $row['product_sub_ctg_name'],
        "image" => 'img/' . $row['product_img1'],
        "image2" => 'img/' . $row['product_img2'],
        "image3" => 'img/' . $row['product_img3'],
        "image4" => 'img/' . $row['product_img4']
    );
}

echo json_encode($products);
mysqli_close($conn);
?>