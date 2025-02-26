<?php
session_start();
require("../scripts/mysql_connect.php");

// 🚨 Validate if form fields are set
if (!isset($_POST["userName"], $_POST["userSurname"], $_POST["userNumber"], $_POST["userEmail"], $_POST["userPassword"], $_POST["userCity"], $_POST["userStreet"], $_POST["userAge"], $_POST["userGender"])) {
    header("Location: ../html/register.php?mess=missing_fields");
    exit();
}

// 🌟 Sanitize and Validate Inputs
$userName = trim(htmlspecialchars($_POST["userName"]));
$userSurname = trim(htmlspecialchars($_POST["userSurname"]));
$userNumber = trim(htmlspecialchars($_POST["userNumber"]));
$userEmail = trim(htmlspecialchars($_POST["userEmail"]));
$userPassword = $_POST["userPassword"]; // Will be hashed
$userCity = trim(htmlspecialchars($_POST["userCity"]));
$userStreet = trim(htmlspecialchars($_POST["userStreet"]));
$userAge = (int)$_POST["userAge"];
$userGender = $_POST["userGender"];

// 🚨 Basic Validation
if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../html/login.php?mess=invalid_email");
    exit();
}
if (!preg_match("/^[0-9]{9,15}$/", $userNumber)) {  // Adjust regex as per your needs
    header("Location: ../html/login.php?mess=invalid_phone");
    exit();
}
if ($userAge < 18) {
    header("Location: ../html/login.php?mess=age_restriction");
    exit();
}

// ✅ Hash Password
$hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

// 🛠️ Connect to DB
$conn = connect();

// 🚀 Check if Email Exists
$query = "SELECT Id_klienta FROM klient WHERE Email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_fetch_assoc($result)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../html/login.php?mess=email_taken");
    exit();
}
mysqli_stmt_close($stmt);

// 📌 Insert User into Database
$query = "INSERT INTO klient (Imie, Nazwisko, Nr_telefonu, Email, haslo, Miasto, Ulica, Wiek, Plec) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("Database error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssssds", $userName, $userSurname, $userNumber, $userEmail, $hashedPassword, $userCity, $userStreet, $userAge, $userGender);

if (mysqli_stmt_execute($stmt)) {
    // ✅ Registration Success - Auto-login
    $_SESSION["user_id"] = mysqli_insert_id($conn);
    $_SESSION["user_email"] = $userEmail;
    $_SESSION["user_name"] = $userName;
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    header("Location: ../html/account.php?mess=registration_success");
    exit();
} else {
    header("Location: ../html/login.php?mess=registration_failed");
    exit();
}
?>
