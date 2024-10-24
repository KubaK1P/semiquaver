<?php
function product($productId, $productName, $productPrice, $productImage, $productCategory, $productWidth) {
echo <<<EOF
<div class="basis-[$productWidth%] bg-white border border-gray-200 rounded-lg shadow">
    <a href="./product.php?id=$productId">
        <img class="rounded-t-lg h-[18rem]" src="$productImage" alt="product image" />
    </a>
    <div class="p-5">
        <a href="./product.php?id=$productId">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">$productName</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500 ">$productCategory</p>
        <div class="flex justify-between items-center">
            <!-- Get atribute with php -->
        <a href="./product.php?id=$productId" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-800 bg-gradient-to-r from-white to-sky-200 rounded-lg shadow">
            Product subpage
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        <p class="text-xl text-gray-700 p-2 font-semibold">$productPrice zł</p>
        </div>
    </div>
</div>
EOF;
}