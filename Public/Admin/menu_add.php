<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Menu_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$menu=new Menu_controller();
$add=$menu->add_product($_POST);

if($add)
{
    $session->set_session("success", "New meal added!");
}
else
{
    $session->set_session("error", "Error, meal allready exists!");
}

header("location: day.php?day=" . $_POST['day']);
exit;
