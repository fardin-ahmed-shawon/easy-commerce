<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "easy_commerce";

$con = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>