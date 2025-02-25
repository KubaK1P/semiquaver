<?php 

session_start();
//maybe more secure
if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.php?mess=login_first");
    exit();
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
    <title>Semiquaver - account</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="">
        <?php
        include "../components/header.shtml";
        ?>
        <main class="bg-gradient-to-b from-sky-200 from-0% to-white pt-[120px]">
            <h1 class="text-4xl">Hello, <?php echo $userName; ?></h1>
        </main>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>