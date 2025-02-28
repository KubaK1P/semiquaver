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

$userId = $_SESSION["user_id"];
$userEmail = $_SESSION["user_email"] ?? "Unknown";
$userName = $_SESSION["user_name"] ?? "Guest";