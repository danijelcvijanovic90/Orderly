<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Menu_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();

$user_id=(int)$_SESSION['user_id'];
$menu_id=(int)$_POST['menu_id'];
$meal_id=(int)$_POST['meal_id'];

$menu_controller=new Menu_controller();
$week_start=$menu_controller->get_week_start();

$add_to_menu=$menu_controller->add_meal_to_user_menu($user_id,$week_start,$menu_id,$meal_id);
var_dump($add_to_menu);
exit;
