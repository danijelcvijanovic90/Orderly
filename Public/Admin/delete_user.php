<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\User_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['id']))
    {
        $id=(int)$_POST['id'];
        $user=new User_controller();
        $delete=$user->delete_user($id);

        header("location: get_users_and_companies.php");
        exit;
    }

}


