<?php 

$router->get('/', "controllers/HomeController.php");



$router->post('/api/customer/login', "controllers/Customer/login.php");
$router->post('/api/customer/register', "controllers/Customer/register.php");



$router->get('/api/Appointment', "controllers/Appointment/show.php");
$router->delete('/api/Appointment', "controllers/Appointment/destroy.php");
$router->update('/api/Appointment', "controllers/Appointment/edit.php");
$router->post('/api/Appointment', "controllers/Appointment/create.php");

