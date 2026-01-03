<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$id=(int)$_POST['id'];


$company=new Company_controller();
$deleted=$company->delete_company($id);

if(!$deleted)
{
    echo "Not valid ID";
}

else
{
    header("location: view_all_companies.php");
    exit;
}