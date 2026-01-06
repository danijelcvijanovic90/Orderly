<?php


require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$user_controller = new User_controller();
$companies = $user_controller->all_companies();

$users=$user_controller->show_user();

require_once __DIR__ . "/../../Views/Admin/User/User_settings.php";

