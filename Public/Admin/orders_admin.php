<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use PROJECT\Controllers\Menu_controller;
use PROJECT\Controllers\Company_controller;
use PROJECT\Controllers\Order_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$category_controller=new Category_controller();
$categories=$category_controller->all_categories();

$menu_controller=new Menu_controller();
$days=$menu_controller->get_all_days();

$company_controller=new Company_controller();
$companies=$company_controller->view_companies();

$order_controller=new Order_controller();
$current_week=$order_controller->get_latest_current_week();

$week_start=$order_controller->get_week_start();

$orders_by_day = [];
$company_id = 0;
$category_id = 0;
$day_id = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

$company_id =(int)$_POST['company_id'];
$category_id=(int)$_POST['category_id'];
$day_id=(int)$_POST['day_id'];


    $orders_by_day = $order_controller->get_orders_overview($current_week,$week_start,$company_id,$category_id,$day_id);   
    
};


$grouped_order=[];

foreach($orders_by_day as $row) 
{
    $day=$row['day'];
    $grouped_order[$day][]=$row;
}

require_once __DIR__ . "/../../views/admin/orders/orders_admin.php";