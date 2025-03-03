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

if (!isset($_SESSION["guitar_components"]) || empty($_SESSION["guitar_components"])) {
    header("Location: ../html/guitar.php?mess=no_components_selected");
    exit();
}

$conn = connect();

// Fetch component IDs
$pickup = $_SESSION["guitar_components"][16] ?? null;
$strings = $_SESSION["guitar_components"][11] ?? null;
$bridge = $_SESSION["guitar_components"][13] ?? null;
$wood = $_SESSION["guitar_components"][14] ?? null;
$tuners = $_SESSION["guitar_components"][15] ?? null;

// Calculate total price
$totalPrice = 1000; // Base guitar price

$query = "SELECT Cena_jednostkowa FROM produkt WHERE Id_produktu IN (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'iiiii', $pickup, $strings, $bridge, $wood, $tuners);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $totalPrice += $row["Cena_jednostkowa"];
}

mysqli_stmt_close($stmt);

// Insert into database
$query = "INSERT INTO gitara (Cena_jednostkowa, Id_pickupu, Id_strun, Id_mostka, Id_drewna, Id_kluczy, Id_klienta) 
          VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'diiiiii', $totalPrice, $pickup, $strings, $bridge, $wood, $tuners, $userId);

if (!mysqli_stmt_execute($stmt)) {
    header("Location: ../html/guitar.php?mess=db_insert_failed");
    exit();
}

$guitarId = mysqli_insert_id($conn);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Redirect to add to cart
header("Location: ./add_guitar_to_cart.php?id=$guitarId");
exit();
?>
