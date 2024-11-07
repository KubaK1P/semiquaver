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
                    <form action="" method="post" class="p-4 bg-sky-100 shadow-xl rounded-md flex flex-col gap-4">
                        <label for="userEmail">E-mail:</label>
                        <input class="shadow-md w-[55%] border-2 border-sky-500 rounded-md p-3" placeholder="..." type="email" id="userEmail" name="userEmail">
                        <label for="userPassword">Password:</label>
                        <input class="shadow-md w-[55%] border-2 border-sky-500 rounded-md p-3" placeholder="..." type="password" id="userPassword" name="userPassword">
                        <button type="submit" class="mt-4 w-[20%] self-start px-4 py-3 text-md font-medium text-center border-2 transition duration-350 border-sky-300 text-gray-900 bg-sky-200 hover:bg-sky-300 rounded-lg shadow">Zaloguj</button>
                    </form>
                </div>
                <div class="basis-40% p-6 min-w-[40%]">
                    <header class="p-2 text-[340%] font-semibold mb-3">
                        <h1>Register</h1>
                    </header>
                    <form action="" method="post" class="p-4 bg-sky-100 shadow-xl rounded-md flex justify-between gap-2 flex-wrap">
                        <div class="basis-[45%] flex flex-col gap-4">
                            <label for="userName">Name: </label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="text" id="userName" name="userName">
                            <label for="userSurname">Surname:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="text" id="userSurname" name="userSurname">
                            <label for="userNumber">Phone number:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="tel" id="userNumber" name="userNumber">
                            <label for="userEmail">E-mail:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="text" id="userEmail" name="userEmail">
                            <label for="userPassword">Password:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="password" id="userPassword" name="userPassword">
                        </div>
                        <div class="basis-[45%] flex flex-col gap-4">
                            <label for="userCity">City: </label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="text" id="userCity" name="userCity">
                            <label for="userStreet">Street:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="text" id="userStreet" name="userStreet">
                            <label for="userAge">Age:</label>
                            <input class="shadow-md border-2 border-sky-500 rounded-md p-3" placeholder="..." type="number" id="userAge" min="0" max="120" name="userAge">
                            <label for="userGender">Gender:</label>
                            <div class="flex justify-evenly" id="userGender">
                                <label for="userGenderM">Male </label>
                                <input class="shadow-md " type="radio" id="userGenderM" name="userGender" value="M">
                                <label for="userGenderF">Female </label>
                                <input class="shadow-md " type="radio" id="userGenderF" name="userGender" value="F">
                            </div>
                        </div>
                        <button type="submit" class="mt-4 w-[20%] basis-[100%] self-start px-4 py-3 text-md font-medium text-center border-2 transition duration-350 border-sky-300 text-gray-900 bg-sky-200 hover:bg-sky-300 rounded-lg shadow">Zarejestruj</button>
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