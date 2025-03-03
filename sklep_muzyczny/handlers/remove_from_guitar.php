<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    // Remove the selected component from that category
    unset($_SESSION["guitar_components"][$categoryId]);
}

// Redirect back to the guitar creator page
header("Location: ../html/guitar.php#creator");
exit();
?>
