<?php


// check if cookis sets or not


if(isset($_COOKIE['Customer_reference'])){

    // if cookie is set then redirect to dashboard
    header('Location: http://localhost:8000/api/controllers/Customer/Dashboard.php');
    exit();
}



