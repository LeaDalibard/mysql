<?php



class ProfileController
{

    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();
        if(isset($_GET['page']) && $_GET['page'] === 'index') {

        }

        require 'View/profile.php';
    }
}