<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$data = new Company_controller;

$result=$data->new_company($_POST);

if($result)
{
    $session->set_session("success", "Company added!");
}
else
{
    $session->set_session("error", "Error,please try again!");
}

header ("location: view_all_companies.php");
exit;
