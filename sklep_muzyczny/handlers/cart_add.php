<?php 

require("../scripts/mysql_connect.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.php?mess=login_first");
    exit();
}

$userId = $_SESSION["user_id"];
$userEmail = $_SESSION["user_email"] ?? "Unknown";
$userName = $_SESSION["user_name"] ?? "Guest";

// Validate and sanitize input
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: ../html/cart.php?mess=invalid_product_id");
    exit();
}
$product_id = (int) $_GET['id'];

if (!isset($_POST["count"]) || !ctype_digit($_POST["count"]) || $_POST["count"] <= 0) {
    header("Location: ../html/cart.php?mess=invalid_count");
    exit();
}
$product_count = (int) $_POST["count"];

$conn = connect();
if (!$conn) {
    header("Location: ../html/cart.php?mess=db_connection_failed");
    exit();
}

// Fetch cart ID
$query = "SELECT Id_koszyka FROM koszyk WHERE Id_klienta = ? LIMIT 1;";
$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    header("Location: ../html/cart.php?mess=db_prepare_failed");
    exit();
}

mysqli_stmt_bind_param($stmt, 'i', $userId);
if (!mysqli_stmt_execute($stmt)) {
    header("Location: ../html/cart.php?mess=db_execute_failed");
    exit();
}

$result = mysqli_stmt_get_result($stmt);
$cart_data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$cart_data) {
    header("Location: ../html/cart.php?mess=no_cart_found");
    exit();
}

$cart_id = $cart_data["Id_koszyka"];

// Insert or update cart entry
$query = "INSERT INTO produkt_koszyk (Id_koszyka, Id_produktu, Ilosc) 
          VALUES (?, ?, ?) 
          ON DUPLICATE KEY UPDATE Ilosc = Ilosc + VALUES(Ilosc);";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    header("Location: ../html/cart.php?mess=db_prepare_failed");
    exit();
}

mysqli_stmt_bind_param($stmt, 'iii', $cart_id, $product_id, $product_count);
if (!mysqli_stmt_execute($stmt)) {
    header("Location: ../html/cart.php?mess=db_execute_failed");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: ../html/cart.php?mess=added_to_cart");
exit();
