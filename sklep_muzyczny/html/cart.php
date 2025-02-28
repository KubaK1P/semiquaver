<?php 

require("../scripts/mysql_connect.php");
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
$totalPrice = 0;
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
                <h1 class="text-5xl font-bold mb-6">Your cart (<?php echo $cartProductsCount ?>)</h1>
                <?php echo ($status)? "<p class='text-red-600 text-2xl mb-4'>" . $status . "</p>" : ""; ?>
                <div class="w-full grid grid-cols-[1fr_1fr_1fr] gap-6">
                <?php
                    if ($cartProductsCount == 0) {
                        echo "<h3 class=\"mb-4 text-lg text-bold text-gray-700\">Nothing found in the cart yet :( </h3>";
                    } else {
                        foreach ($cartProducts as $cartProduct) {
                            echo product($cartProduct["Id_produktu"], $cartProduct["Nazwa_produktu"], $cartProduct["Cena_jednostkowa"], $cartProduct["Zdjecie_produktu"], $cartProduct["Id_kategorii_produktu"], $cartProduct["Nazwa_kategorii_produktu"], 25, $cartProduct["Ilosc"]);
                            $totalPrice += $cartProduct["Ilosc"] * $cartProduct["Cena_jednostkowa"];
                        }
                    }
                    ?> 
                </div>
                <?php echo "<h4 class=\"mb-4 mt-6 text-3xl font-semibold text-gray-800\"> Total: " . $totalPrice . " zł</h4>"; ?>
            </div>
        </main>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>