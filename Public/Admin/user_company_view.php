<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\User_controller;
use PROJECT\Services\Session_service;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$company_id = (int)$_GET['company_id'];
$user = new User_controller();

$user_company = $user->user_by_company($company_id);



require_once __DIR__ . "/../../Views/Admin/User/Show_users.php";