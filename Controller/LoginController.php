<?php

class LoginController {


    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();




        require 'View/login.php';


    }

}