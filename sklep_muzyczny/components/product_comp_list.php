<?php
//Bazia danych - działa
require("../scripts/mysql_connect.php");
include "../components/product_comp.php";

$conn = connect();

$result = mysqli_query($conn ,"SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, kategoria_produktu.Nazwa_kategorii_produktu FROM produkt INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu");

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo var_dump($products);
foreach ($products as $product) {
    product($product["Id_produktu"], $product["Nazwa_produktu"], $product["Cena_jednostkowa"], $product["Zdjecie_produktu"], $product["Nazwa_kategorii_produktu"]);
}

mysqli_close($conn);