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
        <main class="h-[89vh] relative p-6" id="main">
            <header class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <!-- position: absolute; maybe -->
                <h2>Semiquaver</h2>
                <p>Your only choice about music equipment</p>
                <div class="">
                    <button>Click</button>
                    <button>Click</button>
                </div>
            </header>
        </main>
        <section class="relative h-[89vh] p-6" id="section">   
        <header class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <!-- position: absolute; maybe -->
                <h2>SemiGood Guitars</h2>
                <p>Check out our guitar creator</p>
                <div class="">
                    <button>Click</button>
                    <button>Click</button>
                </div>
            </header>      
        </section>
        <aside class="h-[40vh] p-6">
            <header class="p-2 m-2">
                <h2 class="text-center">Our Customers' words</h2>
            </header>
            <section class="flex justify-evenly">
                <article class="p-2">
                    <header> 
                        <h3>Clark</h3>
                    </header>
                    <p>The shop worked fine </p>
                </article>
                <article class="">
                    <header> 
                        <h3>Clark</h3>
                    </header>
                    <p>The shop worked fine </p>
                </article>
                <article class="">
                    <header> 
                        <h3>Clark</h3>
                    </header>
                    <p>The shop worked fine </p>
                </article>
            </section>
        </aside>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>
</html>