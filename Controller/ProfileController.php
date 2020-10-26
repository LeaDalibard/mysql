<?php



class ProfileControllerController
{

    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();




        require 'View/profile.php';
    }
}