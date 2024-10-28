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
                <h1 class="" id="searchResult">Store</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.35" d="m6 6l6 6l6-6M6 12l6 6l6-6" />
                </svg>
            </div>
        </header>
        <div class="flex min-h-[60vh] p-6">
            <aside class="flex flex-col basis-[35%] p-2">
            <section>
                    <header class="text-3xl text-semibold p-2">
                        <h2>Sorting</h2>
                    </header>
                    <ul>
                        <li><a href="#">Price - asc</a></li>
                        <li><a href="#">Price - desc</a></li>
                        <li><a href="#">Name</a></li>
                    </ul>
                </section>
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
                <header class="flex text-4xl text-bold mb-6">
                    <h2 class="text-5xl basis-1/2 p-2 pl-4">Products</h2>
                    <form action="./store.php#searchResult" method="post" class="flex basis-1/2 gap-4 rounded-md border-2 border-sky-500 overflow-hidden mx-auto">
                        <input type="text" placeholder="Search products" name="search_term"
                            class="w-full outline-none bg-white text-gray-700 text-lg px-4 py-3" />
                        <button value="" type='submit' class="flex items-center justify-center bg-sky-400 px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-white">
                                <path
                                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </header>
                <div class="flex flex-wrap gap-8 pl-10 pr-10" id="products">
                    <?php
                    include "../components/product_comp_list.php";

                    $productCount = show_products((isset($_POST["search_term"]))? $_POST["search_term"]: "");

                    if ($productCount == 0) {
                        echo "<h3 class=\"mb-4 text-lg text-bold text-gray-700\">Nothing found, perhaps you are searching for a medieval lute?</h3> <a href=\"https://en.wikipedia.org/wiki/Lute\" class=\"text-lg text-semibold text-sky-300\">Lute info</a>";
                    }
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