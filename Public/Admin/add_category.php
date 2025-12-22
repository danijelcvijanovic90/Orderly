<?php 

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$category=new Category_controller();
$new_category=$category->new_category($_POST);

$session=new Session_service();

if($new_category)
{
    $session->set_session("success", "New Category added!");
    
}
else
{
    $session->set_session("error","Category allready exists");
}

header("location: products.php");
exit;