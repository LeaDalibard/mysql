
<?php



class HomepageController
{

    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();

        $students= new StudentsLoader($pdo);


        require 'View/homepage.php';
    }
}