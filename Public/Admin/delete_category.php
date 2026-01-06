<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$category_id=(int)$_POST['category_id'];
$category=new Category_controller();
$result=$category->delete_category_by_id($category_id);

if($result)
{
    $session->set_session("category_delete_success","Product deleted!");
}
else
{
    $session->set_session("category_delete_error","Error,please try again!");
}

header ("location: products.php");
exit;

