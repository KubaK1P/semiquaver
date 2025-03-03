<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["user_name"])) {
    $userName = null;
} else {

$userId = $_SESSION["user_id"];
$userName = $_SESSION["user_name"];
$userEmail = $_SESSION["user_email"];
$conn = connect();

$query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, 
                 kategoria_produktu.Nazwa_kategorii_produktu, kategoria_produktu.Id_kategorii_produktu, produkt_koszyk.Ilosc 
          FROM klient 
          INNER JOIN koszyk ON koszyk.Id_klienta = klient.Id_klienta
          INNER JOIN produkt_koszyk ON produkt_koszyk.Id_koszyka = koszyk.Id_koszyka
          INNER JOIN produkt ON produkt.Id_produktu = produkt_koszyk.Id_produktu
          INNER JOIN kategoria_produktu ON kategoria_produktu.Id_kategorii_produktu = produkt.Id_kategorii_produktu
          WHERE klient.Id_klienta = ? ;";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("MySQL prepare statement failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'i', $userId);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$cartProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

$cartProductsCount = count($cartProducts);
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
?>

<header class="w-screen fixed z-10 flex justify-between p-6 bg-[#ffffffaa]">
    <header class="p-2">
        <h1 class="text-3xl font-semibold tracking-wide"> <a href="../html/home.php">Semiquaver</a></h1>
    </header>
    <nav class="flex flex-col justify-center p-2 text-lg ">
        <ul class="flex justify-between gap-6 text-center font-semibold">
            <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./store.php">Store</a></li>
            <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="../html/guitar.php">Guitar Creator</a></li>
            <?php if (!$userName) { ?>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./login.php">Login / Register</a></li>
            <?php } else { ?>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="../html/cart.php">Cart <?php echo ($cartProductsCount > 0)? "(" . $cartProductsCount . ")":""; ?></a></li>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3" href="./account.php"><?php echo $userName; ?>'s Account</a></li>
                <li class="p-2"><a class="transition duration-350 rounded-md hover:bg-white p-3 hover:text-red-600" href="../handlers/account_logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>