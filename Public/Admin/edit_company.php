<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$company = new Company_controller();
$update=$company->update_company($_POST);

if($update)
{
    $success=$session->set_session("success","Company update completed!");    
}

else
{
    $error=$session->set_session("error","Not completed!");
}

header("location: edit_company_decider.php?id=" . $_POST['id']);
exit;


