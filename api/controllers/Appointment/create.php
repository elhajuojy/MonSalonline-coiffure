<?php 

use core\App;
use core\Database;
use core\Response;



//appoiment/create.php information and add them to the database

$newAppoiment = $_POST;

$db = App::resolve(Database::class);

// dd($_POST);
//check if the customer is already in the database


$db->query("INSERT INTO Appointment (CustomerID, EmployeeID, AppointmentDate, AppointmentTime, AppointmentStatus, AppointmentType, AppointmentNotes) VALUES (:CustomerID, :EmployeeID, :AppointmentDate, :AppointmentTime, :AppointmentStatus, :AppointmentType, :AppointmentNotes)", $newAppoiment);
