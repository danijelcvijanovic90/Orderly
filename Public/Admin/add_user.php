<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();


if(isset($_POST['add_user']))
{
    $user = new User_controller();
    $user->new_user($_POST);
}



