<?php
function product($productId, $productName, $productPrice, $productImage, $categoryId, $productCategory, $productWidth, $productCount)
{
    $guitarCreatorAddButton = '';
    if (str_contains($_SERVER["REQUEST_URI"], "guitar.php")) {
        $guitarCreatorAddButton = "<a href='../handlers/add_to_guitar.php?id=$productId&category=$categoryId' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center border-2 border-sky-300 text-gray-800 bg-sky-100 hover:bg-sky-200 rounded-lg shadow'>
            Add to your guitar
        </a>";
    }

    $mult = ($productCount)? $productCount . " x" : "" ;
    echo <<<EOF
<div class="basis-[$productWidth%] bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between">
    <a href="./product.php?id=$productId" class="h-[60%] flex justify-center">
        <img class="rounded-t-lg object-cover" src="$productImage" alt="product image" />
    </a>
    <div class="p-5">
        <a href="./product.php?id=$productId">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">$productName</h5>
        </a>
        <a href="./store.php?category=$categoryId#searchResult" class="mb-6 font-normal text-gray-500 hover:text-sky-600">$productCategory</a>
        <div class="flex justify-between items-center">
            <!-- Get atribute with php -->
        <a href="./product.php?id=$productId" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center border-2 border-sky-300 text-gray-800 bg-sky-100 hover:bg-sky-200 rounded-lg shadow">
            Product subpage
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        $guitarCreatorAddButton
        <p class="text-xl text-gray-700 p-2 font-semibold">$mult $productPrice zł</p> 
        </div>
    </div>
</div>
EOF;
}