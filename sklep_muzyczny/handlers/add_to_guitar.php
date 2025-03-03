<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure product ID and category ID are provided
if (isset($_GET['id']) && isset($_GET['category'])) {
    $productId = $_GET['id'];
    $categoryId = $_GET['category'];

    // Prevent duplicate components in the same category
    $_SESSION["guitar_components"][$categoryId] = $productId;
}

// Redirect back to the guitar creator page
header("Location: ../html/guitar.php#creator");
exit();
?>
