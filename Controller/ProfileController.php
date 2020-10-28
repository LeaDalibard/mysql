<?php


class ProfileController
{

    public function render(array $GET, array $POST)
    {

        if (isset($_SESSION['email']) && isset($_SESSION['profile_email'])) {
            if ($_SESSION['email'] == $_SESSION['profile_email']) {
                $buttondelete = '<a href="index.php?action=delete" class="btn btn-primary m-3">Delete</a>';
                $buttonupdate = '<a href="index.php?action=update" class="btn btn-primary m-3">Update</a>';

            } else {
                $buttondelete = '';
                $buttonupdate = '';
            }
        }

        if(isset($_GET['action']) && $_GET['action']=='delete'){
            header('Location: index.php');
            exit();
        }



        require 'View/profile.php';
    }
}