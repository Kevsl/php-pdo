<?php
include("./autoload.php");

use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use ProductManager\ProductManager;

$dbConnexion = new DbConnexion();
$productsManager = new ProductManager($dbConnexion);
$categoryManager = new CategoryManager($dbConnexion);

$products = $productsManager->getAllProductsWithCategories();
$categories = $categoryManager->getAllCategories();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="font-bold text-3xl text-center my-6">
        TD ECOMMERCE
    </h1>

    <h2 class='font-bold text-xl text-center'>Tous nos produits</h2>
    <div class="flex flex-wrap w-5/6 mx-auto ">
        <?php

        foreach ($products as $product) {
            echo "
        <div class='w-1/6 h-64 pb-4 mx-8 bg-gray-300  border border-gray-300 border-2 rounded-xl my-8 relative'>
        <img src='" . $product->getImage_products() . "' class='w-full h-3/4 object-cover rounded-xl'/>
        <p class=' pl-4 mt-2 h-12 truncate'>" . $product->getName_products() . " 
        <div class='flex items-center justify-between pr-4 '>
        <a href='./edit-product.php?id=" . $product->getId_products() . "' class='absolute top-1 right-1 bg-black w-8 h-8 flex items-center flex-col justify-center rounded-xl cursor-pointer'> <i class='fa-solid fa-pen-to-square text-white'></i> </a>
        <a href='./delete-product.php?id=" . $product->getId_products() . "' class='absolute top-1 right-12 bg-black w-8 h-8 flex items-center flex-col justify-center rounded-xl cursor-pointer'><i class='fa-solid fa-trash text-white'></i></a>


            <p class=' pl-4 italic capitalize text-sm' > " . $product->getName_category() . "</p>
                        <p class=' text-displxl text-black bold pl-4'>" . $product->getPrice_products() . "€</p>
</div>
        </div>
        ";
        }
        ?>
    </div>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add product</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="traitement.php" method="POST" name="addProduct">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product name</label>
                    <div class="mt-2">
                        <input id="name" name="name_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>

                    </div>
                    <div class="mt-2">
                        <input id="description" name="description_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>
                </div>


                <div>
                    <div class="flex items-center justify-between">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>

                    </div>
                    <div class="mt-2">
                        <input id="price" name="price_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Image</label>

                        </div>
                        <div class="mt-2">
                            <input id="image" name="image_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Category</label>

                        </div>
                        <div class="mt-2">
                            <select id="category" name="id_category" type="text" required class="capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                                <?php
                                foreach ($categories as $category) {

                                    echo "<option class='capitalize' value=" . $category->getId_category() . " >" . $category->getName_category() . "</option>>";
                                }
                                ?>
                            </select>
                        </div>




                    </div>

                    <div>
                        <button type="submit" name="addProduct" class="mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add product</button>
                    </div>
            </form>

        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add Category</h2>
        </div>
        <form class="space-y-6" action="traitement.php" method="POST" name="addCategory">
            <div class="flex items-center justify-between">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Category name</label>

            </div>
            <div class="mt-2">
                <input id="name" name="name_category" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
            </div>
            <button type="submit" name="addCategory" class="mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Category</button>


        </form>
    </div>


    </div>

</body>





<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/ff684f1294.js" crossorigin="anonymous"></script>

</html>