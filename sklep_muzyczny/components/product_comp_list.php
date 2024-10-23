<?php
//Bazia danych - czemu nie działa
require("../scripts/mysql_connect.php");
$conn = connect();

include "../components/product_comp.php";

//to pewnie jakas petla bedzie
product(1, "Flet", "Flet prosty", 10, "../img/product-example.jpg");
product(2, "Nie flet", "Nie flet prosty", 100, "../img/product-example.jpg");
product(3, "Pianino", "Dalej nie flet prosty", 550, "../img/product-example.jpg");
product(4, "Pianino inne", "Dalej nie flet prosty inne", 70, "../img/product-example.jpg");
product(5, "Trąbka", "Dalej nie flet prosty", 50, "../img/product-example.jpg");
product(6, "Saksofon", "Fajny saksofon", 70, "../img/product-example.jpg");

mysqli_close($conn);