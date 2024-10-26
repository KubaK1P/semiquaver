<?php

function get_query($term) {
    $query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, kategoria_produktu.Nazwa_kategorii_produktu FROM produkt INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu WHERE produkt.Nazwa_produktu LIKE \"%" . $term . "%\" OR kategoria_produktu.Nazwa_kategorii_produktu LIKE \"%" . $term . "%\" ORDER BY produkt.Nazwa_produktu ASC;";
    return $query;
}