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
$category_id= isset($_GET['category_id']) ? (int)$_GET['category_id'] :0;

if($category_id>0)
{
    $products=$get_products->get_products_by_category_id($category_id);
}
else
{
    $products=[];
}



require_once __DIR__ . "/../../Views/admin/products/products.php";