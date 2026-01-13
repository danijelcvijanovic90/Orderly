<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Menu_controller;
use PROJECT\Controllers\Category_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();

$user_id=(int)$_SESSION['user_id'];
$category_id= $_GET['category_id'];

$menu_controller=new Menu_controller();
$user_menu=$menu_controller->user_menu($category_id);

$grouped_menu = [];
foreach($user_menu as $row) 
{
    $day=$row['day'];
    $grouped_menu[$day][]=$row;
}


require_once __DIR__ . "/../../views/user/orders_by_category.php";