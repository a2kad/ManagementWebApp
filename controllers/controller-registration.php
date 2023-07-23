<?php

require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Users.php';

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $error['lastname'] = 'Le nom est obligatoire';
            $error['lastname_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_NAME, $_POST['lastname'])) {
            $error['lastname'] = 'Le nom n\'est pas valide';
            $error['lastname_red'] = 'is-invalid';
        }
    }

    if (isset($_POST['name'])) {
        if (empty($_POST['name'])) {
            $error['name'] = 'Le prénom est obligatoire';
            $error['name_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_NAME, $_POST['name'])) {
            $error['name'] = 'Le prénom n\'est pas valide';
            $error['name_red'] = 'is-invalid';
        }
    }

    if (isset($_POST['tel'])) {
        if (empty($_POST['tel'])) {
            $error['tel'] = 'Le téléphone number est obligatoire';
            $error['tel_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_TEL, $_POST['tel'])) {
            $error['tel'] = 'Le téléphone number n\'est pas valide';
            $error['tel_red'] = 'is-invalid';
        }
    }

    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = 'Le mail est obligatoire';
            $error['email_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_EMAIL, $_POST['email'])) {
            $error['email'] = 'Le mail n\'est pas valide';
            $error['email_red'] = 'is-invalid';
        }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $error['password'] = 'Le mot de passe est obligatoire';
            $error['password_red'] = 'is-invalid';
        } else if (!preg_match(REGEX_PASSWORD, $_POST['password'])) {
            $error['password'] = 'Le mot de passe n\'est pas valide (Minimum huit caractères, au moins une lettre et un chiffre)';
            $error['password_red'] = 'is-invalid';
        }
    }
    if ($_POST['password'] != $_POST['conformation']){
        $error['conformation'] = 'Les mots de passe ne correspondent pas';
        $error['conformation_red'] = 'is-invalid';
    }

    if (empty($error)) {
        Users::createUser($_POST);
    }else{
        $error['bdd'] = 'Une erreur est survenue lors de l\'ajout de l\'animal';
    }
}

require_once "../views/view-registration.php";
