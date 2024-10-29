<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semiquaver - login</title>
    <!-- <link rel="stylesheet" href="../css/main.css"> -->
    <link rel="stylesheet" href="../css/background_image.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="">
        <?php
        include "../components/header.shtml";
        ?>
        <main class="h-[80vh] flex justify-center items-center">
            <div class="w-[45%] p-6">
                <header class="p-2 text-[340%] font-semibold">
                    <h1>Login</h1>
                </header>
                <form action="" class="flex flex-col gap-4">
                    <label for="userName">Name: </label>
                    <input type="text" id="userName" name="userName">
                    <label for="userSurname">Surname:</label>
                    <input type="text" id="userSurname" name="userSurname">
                    <label for="userNumber">Phone number:</label>
                    <input type="text" id="userNumber" name="userNumber">
                    <label for="userEmail">E-mail:</label>
                    <input type="text" id="userEmail" name="userEmail">
                </form>
            </div>
            <div class="w-[45%] p-6">
                <header class="p-2 text-[340%] font-semibold">
                    <h1>Register</h1>
                </header>
                <form action="" class="flex flex-col gap-4">
                    <label for="userName">Name: </label>
                    <input type="text" id="userName" name="userName">
                    <label for="userSurname">Surname:</label>
                    <input type="text" id="userSurname" name="userSurname">
                    <label for="userNumber">Phone number:</label>
                    <input type="text" id="userNumber" name="userNumber">
                    <label for="userEmail">E-mail:</label>
                    <input type="text" id="userEmail" name="userEmail">
                </form>
            </div>
        </main>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>