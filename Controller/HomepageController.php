<?php


class HomepageController
{

    public function render(array $GET, array $POST)
    {
       if(!isset($_SESSION["logged"])){
           $_SESSION["logged"]=false;
       }
        $pdo = openConnection();

        $students = new StudentsLoader($pdo);

        if (!isset($_SESSION["profile_first_name"])){
            $_SESSION["profile_first_name"] = "";
        }
        if (!isset($_SESSION["profile_last_name"])) {
            $_SESSION["profile_last_name"] = "";
        }
        if (!isset($_SESSION["profile_email"])) {
            $_SESSION["profile_email"] = "";
        }
        if (!isset($_SESSION["profile_image"])) {
            $_SESSION["profile_image"] = "profile_image";
        }


        if (isset($_GET['user'])) {
            $handle = $pdo->prepare('SELECT * FROM student where id = :id');
            $handle->bindValue(':id', $_GET['user']);
            $handle->execute();
            $selectedStudent = $handle->fetch();
            $_SESSION["profile_first_name"] = $selectedStudent['first_name'];
            $_SESSION["profile_last_name"] = $selectedStudent['last_name'];
            $_SESSION["profile_email"] = $selectedStudent['email'];
            $_SESSION["profile_image"]=$selectedStudent['image'];
            $_SESSION['login'] = true;
            header('Location: index.php');
            exit();
        }


        require 'View/homepage.php';
    }
}