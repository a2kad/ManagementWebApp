<?php
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";

$regexString = '/^[a-zA-Z]+$/';
$message = [];
$error = [];
$showButtons = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = 'Le mail est obligatoire';
            $error['email_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_EMAIL, $_POST['email'])) {
            $error['email'] = 'Le mail n\'est pas valide';
            $error['email_red'] = 'is-invalid';
        }
    }
    $email = $_POST['email'];


    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $error['password'] = 'Le mot de passe est obligatoire';
            $error['password_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_PASSWORD, $_POST['password'])) {
            $error['password'] = 'Le mot de passe n\'est pas valide (Minimum huit caractères, au moins une lettre et un chiffre)';
            $error['password_red'] = 'is-invalid';
        }
    }

    if (!$_POST['g-recaptcha-response']) {
        $error['recaptcha'] = 'reCaptcha est requis';
    } else {
        $query = RECAPTCHA_URL . '?secret=' . RECAPTCHA_KEY . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents($query));
        var_dump($_POST);
        if ($data->success == false) {
            $error['recaptcha'] = 'reCaptcha incorrect';
        }
    }

    $password = $_POST['password'];


    if (empty($error)) {
        if (Users::checkLogin($email)) {
            if (Users::checkPassword($email, $password)) {

                $showButtons = false;
                $message['email'] = 'Connected';
                $_SESSION['user'] = Users::getUser($email);
                header('Location: ../controllers/controller-gerer.php');
                exit;
            } else {
                $error['password'] = 'Mauvais mot de passe';
            }
        } else {
            $error['email'] = 'Mauvais adresse e-mail';
        }
    } else {
        $error['bdd'] = 'Une erreur est survenue lors de l\'ajout de l\'utilisateur';
    }
}

require_once "../views/view-index.php";
