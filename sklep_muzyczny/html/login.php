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
    <main class="h-[100vh] flex justify-center items-center bg-gradient-to-b from-sky-200 from-0% to-white">
            <div class="w-full flex gap-4 justify-around">
                <div class="basis-40% p-6 min-w-[40%]">
                    <header class="p-2 text-[340%] font-semibold mb-3">
                        <h1>Login</h1>
                    </header>
                    <form action="" class="flex flex-col gap-4">
                        <label for="userEmail">E-mail:</label>
                        <input class="border-2 border-sky-500 rounded-md" type="text" id="userEmail" name="userEmail">
                        <label for="userPassword">Password:</label>
                        <input class="border-2 border-sky-500 rounded-md" type="password" id="userPassword" name="userPassword">
                        <button type="submit" class="w-[20%] self-start px-4 py-3 text-md font-medium text-center border-2 transition duration-350 border-sky-300 text-gray-900 bg-sky-200 hover:bg-sky-300 rounded-lg shadow">Zaloguj</button>
                    </form>
                </div>
                <div class="basis-40% p-6 min-w-[40%]">
                    <header class="p-2 text-[340%] font-semibold mb-3">
                        <h1>Register</h1>
                    </header>
                    <form action="" class="flex flex-col gap-4">
                        <label for="userName">Name: </label>
                        <input class="border-2 border-sky-500 rounded-md" type="text" id="userName" name="userName">
                        <label for="userSurname">Surname:</label>
                        <input class="border-2 border-sky-500 rounded-md" type="text" id="userSurname" name="userSurname">
                        <label for="userNumber">Phone number:</label>
                        <input class="border-2 border-sky-500 rounded-md" type="text" id="userNumber" name="userNumber">
                        <label for="userEmail">E-mail:</label>
                        <input class="border-2 border-sky-500 rounded-md" type="text" id="userEmail" name="userEmail">
                        <button type="submit" class="w-[20%] self-start px-4 py-3 text-md font-medium text-center border-2 transition duration-350 border-sky-300 text-gray-900 bg-sky-200 hover:bg-sky-300 rounded-lg shadow">Zarejestruj</button>
                    </form>
                </div>
            </div>
        </main>
        <?php
        include "../components/footer.shtml";
        ?>
    </div>
</body>

</html>