<?php
function guitar($defaultId, $defaultName, $defaultPrice, $defaultImage)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // require("../scripts/mysql_connect.php");

    $conn = connect();

    // Get the selected components
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

    // Fetch details of selected components
    $totalPrice = $defaultPrice;
    foreach ($selectedComponents as $categoryId => $productId) {
        $query = "SELECT Nazwa_produktu, Cena_jednostkowa FROM produkt WHERE Id_produktu = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            echo "<li class='text-lg text-gray-700'>{$product['Nazwa_produktu']} - {$product['Cena_jednostkowa']} zł</li>";
            $totalPrice += $product['Cena_jednostkowa'];
        }

        mysqli_stmt_close($stmt);
    }

    echo <<<EOF
            </ul>
            <div class="flex justify-between items-center mt-4">
                <p class="text-xl text-gray-700 font-semibold">Total: $totalPrice zł</p>
                <a href="checkout.php" class="px-4 py-2 bg-sky-500 text-white rounded-lg shadow">Buy Now</a>
            </div>
        </div>
    </div>
EOF;

    mysqli_close($conn);
}
