<?php 

$router->get('/', "controllers/HomeController.php");


$router->post('/api/customer/login', "controllers/Customer/login.php");
$router->post('/api/customer/register', "controllers/Customer/register.php");





