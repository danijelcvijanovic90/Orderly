<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Services\Session_service;
use PROJECT\Controllers\Menu_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$menu_controller=new Menu_controller();
$days=$menu_controller->get_all_days();

require_once __DIR__ . "/../../views/admin/menu/menu.php";