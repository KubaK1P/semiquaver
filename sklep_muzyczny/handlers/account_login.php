<?php
require("../scripts/mysql_connect.php");
session_start(); // Start the session

if (!(isset($_POST["userEmail"]) && isset($_POST["userPassword"]))) {
    header("Location: ../html/login.php?mess=unsuccessful_login");
    exit();
}

$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];

$conn = connect();

$query = "SELECT Id_klienta, Email, haslo, Imie 
          FROM klient 
          WHERE Email = ?;";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("MySQL prepare statement failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 's', $userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$client = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);

if ($client) {
    // todo: Secure password check 
    if (password_verify($userPassword, $client["haslo"])) {
        // Store user data in session
        $_SESSION['user_id'] = $client['Id_klienta'];
        $_SESSION['user_email'] = $client['Email'];
        $_SESSION['user_name'] = $client['Imie'];

        // Redirect to dashboard or home page
        header("Location: ../html/account.php");
        exit();
    } else {
        // Wrong password
        header("Location: ../html/login.php?mess=incorrect_password");
        exit();
    }
} else {
    // No such user
    header("Location: ../html/login.php?mess=user_not_found");
    exit();
}
?>
