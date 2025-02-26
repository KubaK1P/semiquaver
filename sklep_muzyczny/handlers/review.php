<?php

require("../scripts/mysql_connect.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//maybe more secure
if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.php?mess=login_first");
    exit();
}

if(!isset($_GET["id"])) {
    header("Location: ../html/login.php?mess=something_happened_with_product_id");
    exit();
}

$product_id = $_GET["id"];

// POST form data for review
$reviewContent = $_POST["review"];

if(trim($reviewContent) == "") {
    header("Location: ../html/product.php?id=" . $product_id ."&mess=please_write_a_review");
    exit();
}

$userId = $_SESSION["user_id"];
$userEmail = $_SESSION["user_email"] ?? "Unknown";
$userName = $_SESSION["user_name"] ?? "Guest";


$conn = connect();

$product_id = $_GET['id'];  

$query = "INSERT INTO opinia (Id_opinii, Tresc_opinii, Id_produktu, Id_klienta) VALUES (null, ? , ? , ?) ;";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("MySQL prepare statement failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'sii', $reviewContent, $product_id, $userId);
if (!mysqli_stmt_execute($stmt)) {
    die("Statement execution failed: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
    
header("Location: ../html/product.php?id=" . $product_id);
exit();