<?php 
include "../components/product_comp.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//maybe more secure
if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.php?mess=login_first");
    exit();
}

$status = null;

if (isset($_GET["mess"])) {
    $status = $_GET["mess"];
}

$userId = $_SESSION["user_id"];
$userEmail = $_SESSION["user_email"] ?? "Unknown";
$userName = $_SESSION["user_name"] ?? "Guest";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver - Cart</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="">
        <?php
        include "../components/header.php";
        ?>
        <main class="bg-gradient-to-b from-sky-200 from-0% to-white pt-[120px] flex justify-center">
            <div class="w-1/2 pt-[40px]">
                <h3 class="text-4xl font-semibold">Your cart</h3>
                <?php echo ($status)? "<p class='text-red-600 text-2xl'>" . $status . "</p>" : ""; ?>
                <div class="w-full">
                    //cart products

                </div>
            </div>
        </main>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>