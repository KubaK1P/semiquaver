<?php
//Bazia danych - nie działa
require("../scripts/search_query.php");

include "../components/product_comp.php";

function show_products($term, $width, $exclude)
{
    $products = get_products($term, $exclude);
    $productsLength = count($products);
    foreach ($products as $product) {
        product($product["Id_produktu"], $product["Nazwa_produktu"], $product["Cena_jednostkowa"], $product["Zdjecie_produktu"], $product["Nazwa_kategorii_produktu"], $width);
    }
    return $productsLength;
}
