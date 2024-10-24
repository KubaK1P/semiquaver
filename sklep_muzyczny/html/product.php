<?php

require("../scripts/mysql_connect.php");

$conn = connect();
$productIdGet = $_GET["id"];

$result = mysqli_query($conn, "SELECT produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu FROM produkt INNER JOIN kategoria_produktu ON kategoria_produktu.Id_kategorii_produktu = produkt.Id_kategorii_produktu WHERE produkt.Id_produktu = " . $productIdGet . ";");

$product = mysqli_fetch_assoc($result);
?>
<!-- Działa skrypciik -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver -
    <?php
        echo " " . $product["Nazwa_produktu"];
    ?>
    </title> 
    <!-- Maybe a  <product name> in the title-->
     <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full">
        <?php
        include "../components/header.shtml";
        ?>
        <main>

        </main>
        <aside>

        </aside>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>