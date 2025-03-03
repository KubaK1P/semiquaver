<?php 

require("../scripts/mysql_connect.php");
include "../components/product_comp.php";
include "../components/guitar_comp.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["guitar_components"])) {
    $_SESSION["guitar_components"] = [];
}

$conn = connect();

$componentCategoryIds = [16, 11, 13, 14, 15];
$componentArrays = array(); 


// get assoc arrays of different category products (guitar components)

foreach ($componentCategoryIds as $i => $componentCategoryId) {
    $query = "SELECT produkt.Id_produktu, produkt.Nazwa_produktu, produkt.Opis_produktu, produkt.Cena_jednostkowa, 
                        produkt.Zdjecie_produktu, kategoria_produktu.Nazwa_kategorii_produktu, kategoria_produktu.Id_kategorii_produktu  
                FROM produkt 
                INNER JOIN kategoria_produktu ON produkt.Id_kategorii_produktu = kategoria_produktu.Id_kategorii_produktu 
                WHERE kategoria_produktu.Id_kategorii_produktu = ? ";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 'i', $componentCategoryId);


    // Check if statement was prepared successfully
    if (!$stmt) {
        die("MySQL prepare statement failed: " . mysqli_error($conn));
    }

    // Execute query and fetch results
    if (!mysqli_stmt_execute($stmt)) {
        die("Statement execution failed: " . mysqli_stmt_error($stmt));
    }

    $result = mysqli_stmt_get_result($stmt);
    $componentArrays[$i] = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

// print_r($componentArrays);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver - Guitar Creator</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="">
        <?php
        include "../components/header.php";
        ?>
        <header class="relative h-[100vh] text-[600%] text-white font-semibold p-6" id="section">
            <div class="flex flex-col items-center absolute top-[77%] left-[50%] translate-x-[-50%] translate-y-[-70%]">
                <h1 class="" id="searchResult">Guitar creator</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.35" d="m6 6l6 6l6-6M6 12l6 6l6-6" />
                </svg>
            </div>
        </header>
        <div class="flex justify-between p-6">
            <main class="basis-[65%] p-2" id="creator">
            <?php
if (isset($_GET["mess"]) && $_GET["mess"] === "missing_components") {
    echo "<div class='bg-red-500 text-white p-4 text-center font-bold'> Please select all required components before proceeding!</div>";
}
?>
                <?php foreach ($componentArrays as $categoryArray) { ?>
                <header class="flex text-4xl text-bold mb-6">
                    <h2 class="text-5xl basis-1/2 p-2 pl-4"><?php echo $categoryArray[0]["Nazwa_kategorii_produktu"]; ?></h2>
                    
                </header>
                <div class="grid grid-cols-[1fr_1fr_1fr] gap-6 mb-6" id="products">
                    <?php
                    if (count($categoryArray) == 0) {
                        echo "<h3 class=\"mb-4 text-lg text-bold text-gray-700\">Nothing found, perhaps you are searching for a medieval lute?</h3> <a href=\"https://en.wikipedia.org/wiki/Lute\" class=\"text-lg text-semibold text-sky-300\">Lute info</a>";
                    } else {
                        foreach ($categoryArray as $product) {
                            echo product($product["Id_produktu"], $product["Nazwa_produktu"], $product["Cena_jednostkowa"], $product["Zdjecie_produktu"], $product["Id_kategorii_produktu"], $product["Nazwa_kategorii_produktu"], 25, null);
                        }
                    }
                    ?>
                </div>
                <?php } ?>
            </main>
            <aside class="basis-[30%] p-2">
                <header class="flex text-4xl text-bold mb-6">
                    <h2 class="text-5xl basis-1/2 p-2 pl-4">Your guitar</h2>
                </header>
                <div class="grid grid-cols-[1fr] mb-6" id="products">
                    <?php echo guitar(69, "Your Guitar", 1000, "../img/guitar_blank.png")?>
                </div>
            </aside>
        </div>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>