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
       include "../components/header.shtml";
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
        <aside class="h-[50vh] p-6">
            <header class="p-2 m-4 text-3xl font-semibold">
                <h2 class="text-center">Our Customers' words</h2>
            </header>
            <section class="flex justify-evenly">
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">Clark</h3>
                    </header>
                    <p class="font-normal">The shop worked fine </p>
                </article>
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">Clark</h3>
                    </header>
                    <p class="font-normal">The shop worked fine </p>
                </article>
                <article class="transition duration-350 basis-[25%] block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-sky-200  dark:border-gray-700">
                    <header> 
                        <h3 class="mb-2 text-2xl font-bold tracking-tight">Clark</h3>
                    </header>
                    <p class="font-normal">The shop worked fine </p>
                </article>
            </section>
        </aside>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>