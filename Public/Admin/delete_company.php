<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$id=(int)$_POST['id'];

$company=new Company_controller();
$deleted=$company->delete_company($id);

if($deleted)
{
    $session->set_session("delete_success","Company deleted!");
}

else
{
    $session->set_session("delete_error","Error,company not deleted!");
}

header("location: view_all_companies.php");
exit;