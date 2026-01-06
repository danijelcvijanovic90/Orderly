<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use Dotenv\Dotenv;
use PROJECT\Controllers\Product_controller;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$add_product=new Product_controller();
$result=$add_product->new_product($_POST);
$session=new Session_service();

if($result)
{
    $session->set_session("success","New product added!");
}
else
{
    $session->set_session("error","Error,please try again!");
}

header ("location: products.php");
exit;