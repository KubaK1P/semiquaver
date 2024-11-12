<?php
require("../components/product_comp_list.php");
// echo $_GET["id"];
$product = get_product_by_id($_GET["id"]);
?>
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
        <main class="h-[75vh] p-6 flex flex-col justify-center">
            <div class="flex justify-around">
                <header class="max-w-[40%] p-6"> 
                    <h1 class="mb-4 tracking-wide text-4xl text-gray-800 font-bold"><?php echo $product["Nazwa_produktu"];?></h1>
                    <a href="store.php?category=1" class="text-2xl text-gray-500 font-semibold"><?php echo $product["Nazwa_kategorii_produktu"];?></a>
                    <p class="mt-3 mb-4 text-lg text-gray-600 font-medium"><?php echo $product["Opis_produktu"];?></p>
                    <div class="flex justify-between items-center">
                            <!-- Get atribute with php -->
                        <a href="./product.php$id=<?php echo $productIdGet;?>" class="inline-flex items-center px-3 py-2 text-xl font-semibold text-center text-gray-800 bg-gradient-to-r from-white to-sky-200 rounded-lg shadow">
                            Add to cart
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                        <p class="text-xl text-gray-800 p-2 font-semibold"><?php echo $product["Cena_jednostkowa"];?> zł</p>
                    </div>
                </header>
                <div class="max-w-[40%] min-w-[35%] flex justify-center">
                    <img class="rounded-t-lg max-h-[40vh]" src="<?php echo $product["Zdjecie_produktu"]; ?> " alt="product image" />
                </div>
            </div>
        </main>
        <aside class="h-[60vh] p-6">
            <header class="D="pl-4 text-3xl text-gray-800 font-bold">Products in the <?php echo $product["Nazwa_kategorii_produktu"]; ?> category:</h2>
            </header>
            <div class="flex flex-wrap justify-between gap-6 pl-10 pr-10">
                <?php
                    $products = show_products($product["Nazwa_kategorii_produktu"], 19, $product["Id_produktu"]);
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