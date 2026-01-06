<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Company_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$companies_controller=new Company_controller();
$companies=$companies_controller->view_companies();



require_once __DIR__ . "/../../Views/Admin/Company/Company_settings.php";


