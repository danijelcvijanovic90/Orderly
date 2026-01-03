<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Product_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$product=new Product_controller();
$result=$product->delete_product_by_id($_GET['id']);

$session=new Session_service();

if($result)
{
    $session->set_session("delete_success","Product deleted!");
}
else
{
    $session->set_session("delete_error","Error,please try again!");
}

header ("location: products.php");
exit;

