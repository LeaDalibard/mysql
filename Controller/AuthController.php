<?php


class AuthController
{
    public function render(array $GET, array $POST)
    {
        $pdo = openConnection();
        date_default_timezone_set("Europe/Brussels");

        //-----------------------------------REGISTER

        //-----------------------------------Set session
        $message = "";
        $messagelogin = "";

        if (!isset($_SESSION["first_name"])) {
            $_SESSION["first_name"] = "";
        }
        if (!isset($_SESSION["last_name"])) {
            $_SESSION["last_name"] = "";
        }
        if (!isset($_SESSION["email"])) {
            $_SESSION["email"] = "";
        }
        if (!isset($_SESSION['valid'])) {
            $_SESSION['valid'] = false;
        }


        if (!isset($_SESSION["username"])) {
            $_SESSION["username"] = "";
        }
        if (!isset($_SESSION["loginpsw"])) {
            $_SESSION["loginpsw"]= "";
        }
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
        }


        //-----------------------------------Required fields

        if (isset($_POST['register'])) {

            if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['psw']) || empty($_POST['psw-repeat'])) {
                $_SESSION["first_name"] = $_POST['first_name'];
                $_SESSION["last_name"] = $_POST['last_name'];
                $_SESSION["email"] = $_POST['email'];

                $message = 'Please fill all the required field';
            } else {
                //-----------------------------------Check if email valid
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION["first_name"] = $_POST['first_name'];
                    $_SESSION["last_name"] = $_POST['last_name'];
                    $_SESSION["email"] = $_POST['email'];
                    $message = "Email is not a valid email address";
                } else {
                    //-----------------------------------    Check if password and password confirm are equal
                    if ($_POST['psw'] != $_POST['psw-repeat']) {
                        $_SESSION["first_name"] = $_POST['first_name'];
                        $_SESSION["last_name"] = $_POST['last_name'];
                        $_SESSION["email"] = $_POST['email'];
                        $message = "Password and Password confirm do not match, please enter your password again";
                    } else {
                        $handle = $pdo->prepare('INSERT INTO student (first_name, last_name, email,created_at,password) VALUES (:first_name, :last_name, :email,:created_at, :password)');
                        $handle->bindValue(':first_name', $_POST['first_name']);
                        $handle->bindValue(':last_name', $_POST['last_name']);
                        $handle->bindValue(':email', $_POST['email']);
                        $handle->bindValue(':created_at', date('Y-m-d H:i'));
                        $handle->bindValue(':password', password_hash($_POST['psw'], PASSWORD_DEFAULT));
                        $handle->execute();
                        $_SESSION["first_name"] = $_POST['first_name'];
                        $_SESSION["last_name"] = $_POST['last_name'];
                        $_SESSION["email"] = $_POST['email'];
                        $_SESSION['valid'] = true;

                    }
                }

            }
        }

        //-----------------------------------LOGIN

        if (isset($_POST['login'])) {

            $students = new StudentsLoader($pdo); // loading the data from the base
            //-------Check if the filled in email can be found on a user with that credential
            if (isset($_POST['username'])) {

                foreach ($students->getStudents() as $student) {
                    if ($student->getEmail() == $_POST['username']) {
                        $_SESSION["username"] = $_POST['username'];
                        $_SESSION["loginpsw"]=$student-> getPassword();
                        $_SESSION["first_name"] = $student->getFirstname();
                        $_SESSION["last_name"] = $student->getLastname();
                        $_SESSION["email"] = $student->getEmail();
                    }
                }
                if(empty($_SESSION["username"]) ){$messagelogin='Something went wrong';}
               else{
                   if(!empty($_POST['loginpsw'])){
                       //-------  Check password match
                       if(password_verify ( $_POST['loginpsw'] , $_SESSION["loginpsw"] )==true)
                       {$_SESSION['login'] = true;}
                       else{$messagelogin='Something went wrong'; }
                   }

               }
            }


        }


        require 'View/auth.php';
    }
}