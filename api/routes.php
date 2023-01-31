<?php 

$router->get('/', "controllers/HomeController.php");
$router->get('api/', "controllers/HomeController.php");
$router->get('api/users', "controllers/UserController.php");