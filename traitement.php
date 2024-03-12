<?php
include("autoload.php");
session_start();
use Category\Category;
use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use Product\Product;
use ProductManager\ProductManager;

if (isset($_POST["addProduct"])) {
    $obj = new Product($_POST);
    $dbConnexion = new DbConnexion;
    $manager = new ProductManager($dbConnexion);
    if ($manager->insertProduct($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauter');
    }
}

if (isset($_POST["addCategory"])) {
    $obj = new Category($_POST);
    $dbConnexion = new DbConnexion;
    $manager = new CategoryManager($dbConnexion);
    if ($manager->insertCategory($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauter');
    }
}

if (isset($_POST["editProduct"])) {
    $obj = new Product($_POST);
    $obj->setId_products($_SESSION["idToUpdate"]);
    $dbConnexion = new DbConnexion;
    $manager = new ProductManager($dbConnexion);
    if ($manager-> editProduct($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauter');
    }
}

