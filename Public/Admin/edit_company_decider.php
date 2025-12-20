<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$id=(int)($_POST['id'] ?? $_GET['id'] ?? 0);

if ($id <= 0) {
    echo "Not valid ID";
    exit;
}

$company_controller=new Company_controller();
$company=$company_controller->company_for_display($id);



if(!$company)
{
    echo "Not valid ID";
}
else
{
    require_once __DIR__ . "/../../Views/Admin/Company/Edit_company.php";
}







