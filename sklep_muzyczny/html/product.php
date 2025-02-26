<?php

require("../scripts/mysql_connect.php");
include "../components/product_comp.php";


$conn = connect();
$product_id = null;

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];  
    $query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, 
                     kategoria_produktu.Nazwa_kategorii_produktu, kategoria_produktu.Id_kategorii_produktu 
              FROM produkt 
              INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu 
              WHERE produkt.Id_produktu = ?;";

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die("MySQL prepare statement failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'i', $product_id);
} else {
    $query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, 
                     kategoria_produktu.Nazwa_kategorii_produktu 
              FROM produkt 
              INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu;";

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die("MySQL prepare statement failed: " . mysqli_error($conn));
    }
}

// **Fix: Execute statement before fetching result**
if (!mysqli_stmt_execute($stmt)) {
    die("Statement execution failed: " . mysqli_stmt_error($stmt));
}

$result = mysqli_stmt_get_result($stmt);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_stmt_close($stmt);
mysqli_close($conn);

if (empty($products)) {
    die("No products found.");
}

$product = $products[0];

$conn = connect();

$categoryId = $product["Id_kategorii_produktu"];  

$query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, produkt.Zdjecie_produktu, 
                 kategoria_produktu.Nazwa_kategorii_produktu, kategoria_produktu.Id_kategorii_produktu  
          FROM produkt 
          INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu 
          WHERE kategoria_produktu.Id_kategorii_produktu = ? AND produkt.Id_produktu <> ? ;";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("MySQL prepare statement failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'ii', $categoryId, $product["Id_produktu"]);

// **Fix: Execute before fetching results**
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$categoryProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

$categoryProductsCount = count($categoryProducts);

// **Close resources properly**
mysqli_stmt_close($stmt);
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver -
        <?php echo $product["Nazwa_produktu"]; ?>
    </title> 
    <!-- Maybe a  <product name> in the title-->
     <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full">
        <?php
        include "../components/header.php";
        ?>
        <main class="p-6 flex flex-col justify-center">
            <div class="mt-[108px] flex justify-around">
                <header class="max-w-[40%] p-6"> 
                    <h1 class="mb-4 tracking-wide text-4xl text-gray-800 font-bold"><?php echo $product["Nazwa_produktu"]; ?></h1>
                    <a href="store.php?category=<?php echo $product["Id_kategorii_produktu"]; ?>" class="text-2xl text-gray-500 font-semibold hover:text-sky-600"><?php echo $product["Nazwa_kategorii_produktu"]; ?></a>
                    <p class="mt-3 mb-4 text-lg text-gray-600 font-medium"><?php echo $product["Opis_produktu"]; ?></p>
                    <div class="flex justify-between items-center">
                            <!-- Get atribute with php -->
                        <a href="./product.php?id=" class="inline-flex items-center px-3 py-2 text-xl font-semibold text-center text-gray-800 bg-gradient-to-r from-white to-sky-200 rounded-lg shadow">
                            Add to cart
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                        <p class="text-xl text-gray-800 p-2 font-semibold"><?php echo $product["Cena_jednostkowa"]; ?> zł</p>
                    </div>
                </header>
                <div class="max-w-[40%] min-w-[35%] flex justify-center">
                    <img class="rounded-t-lg max-h-[40vh]" src="<?php echo $product["Zdjecie_produktu"]; ?>" alt="product image" />
                </div>
            </div>
        </main>
        <aside class="h-[60vh] p-6">
            <header class="pl-4 text-3xl text-gray-800 font-bold mb-6">Products in the <?php echo $product["Nazwa_kategorii_produktu"]; ?> category:</h2>
            </header>
            <div class="grid grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr] gap-6 pl-10 pr-10">
            <?php
                    if ($categoryProductsCount == 0) {
                        echo "<h3 class=\"mb-4 text-lg text-bold text-gray-700\">Nothing found in the category, perhaps you are searching for a medieval lute?</h3> <a href=\"https://en.wikipedia.org/wiki/Lute\" class=\"text-lg text-semibold text-sky-300\">Lute info</a>";
                    } else {
                        foreach ($categoryProducts as $categoryProduct) {
                            echo product($categoryProduct["Id_produktu"], $categoryProduct["Nazwa_produktu"], $categoryProduct["Cena_jednostkowa"], $categoryProduct["Zdjecie_produktu"], $categoryProduct["Id_kategorii_produktu"], $categoryProduct["Nazwa_kategorii_produktu"], 25);
                        }
                    }
                    ?>
            </div>
        </aside>
        <section class="h-[60vh] p-6">
            <!-- Reviews here probably -->
            <!-- To Do -->
        </section>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>