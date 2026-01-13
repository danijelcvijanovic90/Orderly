<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Category_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();

$user_id=(int)$_SESSION['user_id'];

$category_controller=new Category_controller();
$categories=$category_controller->all_categories();


require_once __DIR__ . "/../../views/user/orders.php";