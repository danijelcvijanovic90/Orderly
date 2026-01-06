<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Product_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$product=new Product_controller();
$result=$product->update_product_by_id($_POST);

if($result)
{
    $session->set_session("success","Product updated successfuly!");
}
else
{
    $session->set_session("error","Error,please try again!");
}

header ("location: products.php");