<?php
require("../scripts/mysql_connect.php");

function get_products($term) {
    $char_whitelist = str_split("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ");
    $new_term = "";
    foreach(str_split($term) as $char){
        if(array_search($char, $char_whitelist)){
            $new_term .= $char;
        }
    }
    $term = "%" . $new_term . "%";

    $conn = connect();
    $query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, kategoria_produktu.Nazwa_kategorii_produktu FROM produkt INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu WHERE produkt.Nazwa_produktu LIKE ? OR kategoria_produktu.Nazwa_kategorii_produktu LIKE ? ORDER BY produkt.Nazwa_produktu ASC;";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $term, $term);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $products;
}