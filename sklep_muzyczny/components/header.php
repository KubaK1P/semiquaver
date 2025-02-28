<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["user_name"])) {
    $userName = null;
} else {

$userName = $_SESSION["user_name"];
$userEmail = $_SESSION["user_email"];
}
?>

<header class="w-screen fixed z-10 flex justify-between p-6 bg-[#ffffffaa]">
    <header class="p-2">
        <h1 class="text-3xl font-semibold tracking-wide"> <a href="../html/home.php">Semiquaver</a></h1>
    </header>
    <nav class="flex flex-col justify-center p-2 text-lg ">
        <ul class="flex justify-between gap-6 text-center font-semibold">
            <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./store.php">Store</a></li>
            <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="#">#</a></li>
            <?php if (!$userName) { ?>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./login.php">Login / Register</a></li>
            <?php } else { ?>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="../html/cart.php">Cart</a></li>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./account.php"><?php echo $userName; ?>'s Account</a></li>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3 hover:text-red-600" href="../handlers/account_logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>