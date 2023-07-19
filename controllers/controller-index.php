<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";

$regexString = '/^[a-zA-Z]+$/';
$message = [];
$errors = [];
$showButtons = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if (Users::checkLogin($email)) {
        
        if (Users::checkPassword($email, $password)) {  
            $showButtons = false;
            $message['email'] = 'Connected';


                $_SESSION['user'] = Users::getUser($email);
            
            
            header('Location: ../controllers/controller-admin.php');
            exit;
        } else {
            $errors['password'] = 'Mauvais mot de passe';
        }
    } else {
        $errors['email'] = 'Mauvais adresse e-mail';
    }
}

require_once "../views/view-index.php";