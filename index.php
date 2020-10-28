<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start(); //Careful put session start on the first place in index

//include all your model files here
require 'Model/connection.php';
require 'Model/Student.php';
require 'Model/StudentsLoader.php';
require 'Model/Catimages.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/RegisterController.php';
require 'Controller/ProfileController.php';
require 'Controller/LoginController.php';
require 'Controller/AuthController.php';

$controller= new HomepageController();

if(isset($_SESSION["logged"]) && $_SESSION["logged"]==false){
    $controller= new AuthController();
}


if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
    $controller = new HomepageController();
}

if (isset($_SESSION['login']) && $_SESSION['login'] != false) {
    $controller = new HomepageController();
}

if(isset($_GET['user'])&& isset($_SESSION['login'])&& $_SESSION['login'] == true) {
    $controller = new ProfileController();
}


if (isset($_POST['home'])&& isset($_SESSION['login'])&& $_SESSION['login'] == true ) {
    $controller = new HomepageController();
}

if (isset($_POST['logout'])) {
    session_destroy();
    session_start();
    $controller = new AuthController();
}

var_dump($_SESSION);

$controller->render($_GET, $_POST);
