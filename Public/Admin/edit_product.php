<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use PROJECT\Controllers\Product_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$category=new Category_controller();
$categories=$category->all_categories();

$get_products=new Product_controller();
$product_id= isset($_GET['product_id']) ? (int)$_GET['product_id'] :0;


if($product_id>0)
{
    $product=$get_products->get_product_by_id($product_id);
}


require_once __DIR__ . "/../../Views/admin/products/edit_product.php";