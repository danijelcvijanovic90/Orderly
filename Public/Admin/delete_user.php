<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

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


