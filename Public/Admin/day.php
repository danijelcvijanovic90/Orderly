<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Menu_controller;
use PROJECT\Controllers\Product_controller;
use PROJECT\Controllers\Category_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$category=new Category_controller();
$categories=$category->all_categories();

$menu=new Menu_controller();
$day=$menu->get_day($_GET['day']);
$menu_day=$menu->menu_day($_GET['day']);



$prod=new Product_controller();
$products=$prod->get_all_products();

require_once __DIR__ . "/../../Views/Admin/Menu/Day_menu.php";
