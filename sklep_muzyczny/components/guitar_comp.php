<?php
function guitar($defaultId, $defaultName, $defaultPrice, $defaultImage)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // require("../scripts/mysql_connect.php");

    $conn = connect();
    $selectedComponents = isset($_SESSION["guitar_components"]) ? $_SESSION["guitar_components"] : [];

    echo <<<EOF
    <div class="bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between">
        <a href="#" class="flex justify-center">
            <img class="rounded-t-lg w-2/3" src="$defaultImage" alt="guitar image" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Your Guitar</h5>
            <ul>
EOF;

    $totalPrice = $defaultPrice;
    foreach ($selectedComponents as $categoryId => $productId) {
        $query = "SELECT Nazwa_produktu, Cena_jednostkowa FROM produkt WHERE Id_produktu = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            echo "<li class='text-lg text-gray-700 flex justify-between'>
                    <span>{$product['Nazwa_produktu']} - {$product['Cena_jednostkowa']} zł</span>
                    <a href='../handlers/remove_from_guitar.php?category=$categoryId' class='text-red-500 hover:text-red-700'>Remove</a>
                  </li>";
            $totalPrice += $product['Cena_jednostkowa'];
        }

        mysqli_stmt_close($stmt);
    }

    echo <<<EOF
            </ul>
            <div class="flex justify-between items-center mt-4">
                <p class="text-xl text-gray-700 font-semibold">Total: $totalPrice zł</p>
                <a href="../handlers/save_guitar.php" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow">Save Guitar & Add to Cart</a>

            </div>
        </div>
    </div>
EOF;

    mysqli_close($conn);
}
