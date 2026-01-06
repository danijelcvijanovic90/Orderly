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
$deleted=$menu->delete_from_menu_meal_by_meal_id_and_menu_id($_POST);

if($deleted)
{
    $session->set_session("delete_success","Meal deleted!");
}

else
{
    $session->set_session("delete_error","Error,meal not deleted!");
}

header("location: day.php?day=" . $_POST['day']);
