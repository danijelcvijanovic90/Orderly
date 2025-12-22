<?php 

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$category=new Category_controller();
$categories=$category->all_categories();

require_once __DIR__ . "/../../Views/admin/products/products.php";