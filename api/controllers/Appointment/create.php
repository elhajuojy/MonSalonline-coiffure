<?php 

use core\App;
use core\Database;
use core\Response;



//appoiment/create.php information and add them to the database

$newAppoiment = filterRequest($_POST);

$db = App::resolve(Database::class);

