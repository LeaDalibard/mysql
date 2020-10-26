
<?php

class InsertController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();

        date_default_timezone_set("Europe/Brussels");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['first_name']) && !empty($_POST['last_name'])&& !empty($_POST['email'])) {
        $handle = $pdo->prepare('INSERT INTO student (first_name, last_name, email,created_at) VALUES (:first_name, :last_name, :email,:created_at)');
        $handle->bindValue(':first_name', $_POST['first_name']);
        $handle->bindValue(':last_name', $_POST['last_name']);
        $handle->bindValue(':email', $_POST['email']);
        $handle->bindValue(':created_at', date('Y-m-d H:i'));
        $handle->execute();
    }
    else {
        $message='Please fill all the field';
    }


}


        require 'View/insert.php';
    }
}