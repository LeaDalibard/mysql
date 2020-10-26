<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start(); //Careful put session start on the first place in index
var_dump($_SESSION);
//include all your model files here
require 'Model/connection.php';
require 'Model/Student.php';
require 'Model/StudentsLoader.php';


//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/RegisterController.php';
require 'Controller/ProfileController.php';
require 'Controller/LoginController.php';
require 'Controller/AuthController.php';


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

//$controller = new HomepageController();
//$controller = new RegisterController();
//$controller = new ProfileControllerController();
$controller= new AuthController();

if($_SESSION['valid'] == true) {
    $controller= new ProfileController();
}

if(isset($_GET['page']) && $_GET['page'] === 'index') {
    unset($_SESSION["first_name"]);
    unset($_SESSION["last_name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["valid"]);
    $controller = new AuthController();
}

//$controller= new LoginController();

$controller->render($_GET, $_POST);
