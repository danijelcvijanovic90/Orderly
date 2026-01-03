<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Product_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();


$product=new Product_controller();
$result=$product->update_product_by_id($_POST);

$session=new Session_service();

if($result)
{
    $session->set_session("success","Product updated successfuly!");
}
else
{
    $session->set_session("error","Error,please try again!");
}

header ("location: products.php");