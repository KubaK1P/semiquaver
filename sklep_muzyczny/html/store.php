<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver - store</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
     <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
        <?php
        include "../components/header.shtml";
        ?>
        <header class="relative h-[100vh] text-[600%] text-white font-semibold p-6" id="store">
            <div class="flex flex-col items-center absolute top-[77%] left-[50%] translate-x-[-50%] translate-y-[-70%]">
                <h1 class="">Store</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
	                <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.35" d="m6 6l6 6l6-6M6 12l6 6l6-6" />
                </svg>
            </div>
        </header>
        <div class="flex min-h-[60vh] p-6">
            <aside class="flex flex-col basis-[35%] p-2">
                <section>
                    <header class="text-3xl text-semibold p-2">
                        <h2>Categories</h2>
                    </header>
                    <ul>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Category</a></li>
                    </ul>
                </section>
                <section>
                    <header class="text-3xl text-semibold p-2">
                        <h2>Filters</h2>
                    </header>
                    <ul>
                        <li><a href="#">Filter</a></li>
                        <li><a href="#">Filter</a></li>
                        <li><a href="#">Filter</a></li>
                    </ul>
                </section>
            </aside>
            <main class="basis-[65%] p-2">
                <header class="text-4xl text-bold mb-6">
                    <h2 class="w-1/2 shadow-md rounded-lg border border-gray-300 p-2 pl-4">Products</h2>
                </header>
                <div class="flex flex-wrap justify-between gap-6 pl-10 pr-10" id="products">
                <?php
                    include "../components/product_comp.php";
                ?>
                </div>
            </main>
        </div>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>