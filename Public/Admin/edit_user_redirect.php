<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use Dotenv\Dotenv;
use PROJECT\Controllers\User_controller;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$user=new User_controller();
$user_info=$user->show_user_by_id($_GET['id']);



if($user)
{
    require_once __DIR__ . "/../../Views/Admin/User/Edit_user.php";
}
else
{
    header ("location: /../index.php");
    exit;
}

