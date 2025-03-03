<?php
require("../scripts/mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver - home page</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
     <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full">
       <?php
       include "../components/header.php";
       ?>
        <main class="h-[100vh] relative p-6" id="main">
            <header class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] text-white font-bold">
                <!-- position: absolute; maybe -->
                <h2 class="text-6xl tracking-wide">Semiquaver</h2>
                <p>Your only choice about music equipment</p>
                <div class="text-semibold text-sky-300">
                    <a href="./store.php">Store</a>
                </div>
            </header>
        </main>
        <section class="relative h-[100vh] p-6" id="section">   
            <header class="absolute top-[50%] left-[70%] translate-x-[-50%] translate-y-[-50%] text-white font-bold">
                    <!-- position: absolute; maybe -->
                    <h2 class="text-5xl tracking-wide">SemiGood Guitars</h2>
                    <p>Check out our guitar creator</p>
                    <div class="">
                        <a href="#" class="text-sky-300">Creator</a>
                    </div>
            </header>      
        </section>
        <aside class="min-h-[65vh] p-6">
            <header class="p-2 m-4 text-3xl font-semibold">
                <h2 class="text-center">Our Customers' words</h2>
            </header>
            <section class="flex justify-evenly">
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">Bralni</h3>
                    </header>
                    <p class="font-normal h-3/4 text-gray-700">Having had the opportunity to test out [product name], I must say that I am thoroughly impressed. The [specific feature] really stood out to me, offering a level of convenience and efficiency that is unparalleled in the market. Additionally, the [another feature] surpassed my expectations, enhancing the overall user experience significantly. 
                    </p>
                    <span class="text-lg font-semibold text-gray-800">5/5</span>
                </article>
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">John</h3>
                    </header>
                    <p class="font-normal h-3/4 text-gray-700">For [target audience], this product is a game-changer. Whether you are a seasoned professional or a tech-savvy individual looking for a reliable [product category], [product name] ticks all the boxes. Its durability, performance, and user-friendly interface make it a must-have in today's fast-paced world.</p>
                    <span class="text-lg font-semibold text-gray-800">5/5</span>
                </article>
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">M3dzia</h3>
                    </header>
                    <p class="font-normal h-3/4 text-gray-700">In conclusion, the [product name] is a top-notch [product category] that delivers on its promises. With its cutting-edge technology and superior design, it is sure to enhance the lives of its users in more ways than one. I highly recommend [product name] to anyone in search of a premium [product category] that exceeds expectations.</p>
                    <span class="text-lg font-semibold text-gray-800">5/5</span>                    
                </article>
            </section>
        </aside>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>