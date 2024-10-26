<?php
//Bazia danych - działa
require("../scripts/mysql_connect.php");
include "../components/product_comp.php";

function show_products($query)
{
    $conn = connect();

    $result = mysqli_execute_query($conn, $query);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $products_length = count($products);

    // echo $products_length;
    foreach ($products as $product) {
        product($product["Id_produktu"], $product["Nazwa_produktu"], $product["Cena_jednostkowa"], $product["Zdjecie_produktu"], $product["Nazwa_kategorii_produktu"], 30);
    }

    mysqli_close($conn);
    // return $products_length;
}
