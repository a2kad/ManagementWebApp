<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";
require_once "../models/Frais.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['motifRejet'])) {
        if (empty($_POST['motifRejet'])) {
            $error['motifRejet'] = 'Le motif de rejet est obligatoire';
            $error['motifRejet_red'] = 'is-invalid';
        }
    }

    if (empty($error)) {
        Frais::setStatusRefuse($_POST['motifRejet'], $_POST['dateRejet'], $_GET['refuse']);
        header('Location: ../controllers/controller-showfrais.php?id_frais='.$_GET['refuse']);
        exit;
    }

}

require_once "../views/view-refusefrais.php";