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

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: ../html/cart.php?mess=invalid_guitar_id");
    exit();
}
$guitarId = (int) $_GET['id'];

$conn = connect();

// Fetch cart ID
$query = "SELECT Id_koszyka FROM koszyk WHERE Id_klienta = ? LIMIT 1;";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cart_data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$cart_data) {
    header("Location: ../html/cart.php?mess=no_cart_found");
    exit();
}

$cart_id = $cart_data["Id_koszyka"];

// Insert into cart
$query = "INSERT INTO gitara_koszyk (Id_koszyka, Id_gitary, Ilosc) 
          VALUES (?, ?, 1) 
          ON DUPLICATE KEY UPDATE Ilosc = Ilosc + 1;";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ii', $cart_id, $guitarId);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: ../html/cart.php?mess=guitar_added");
exit();
?>
