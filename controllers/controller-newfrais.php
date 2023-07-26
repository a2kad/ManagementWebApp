<?php
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";
require_once "../models/Frais.php";

$message = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['date'])) {
        if (empty($_POST['date'])) {
            $error['date'] = 'Le date est obligatoire';
            $error['date_red'] = 'is-invalid';
        }
    }
    if (!isset($_POST['motif'])) {

        $error['motif'] = 'Le motif est obligatoire';
        $error['motif_red'] = 'is-invalid';
    }

    if (isset($_POST['ttc'])) {
        if (empty($_POST['ttc'])) {
            $error['ttc'] = 'Le Montant TTC est obligatoire';
            $error['ttc_red'] = 'is-invalid';
        }
    }

    if (isset($_POST['tva'])) {
        if (empty($_POST['tva'])) {
            $error['tva'] = 'Le TVA est obligatoire';
            $error['tva_red'] = 'is-invalid';
        }
    }
    if (isset($_POST['ht'])) {
        if (empty($_POST['ht'])) {
            $error['ht'] = 'Le Montant HT est obligatoire';
            $error['ht_red'] = 'is-invalid';
        }
    }

    // Download files

    if (isset($_FILES['image'])) {
        
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $file_name)));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $error['image'] = "Extension non autorisée, veuillez choisir un fichier JPEG ou PNG";
        }

        if ($file_size > 2097152) {
            $error['image'] = 'La taille du fichier doit être d\'exactement 2 Mo';
        }
    }
    if (empty($error)) {
        if (move_uploaded_file($file_tmp, "../assets/files/" . $file_name)) {
            
            header('Location: ../controllers/controller-verif.php');
            exit;
        } else {
            $error['bdd'] = 'Erreur de téléchargement';
        }
    } else {
        $error['bdd'] = 'Une erreur est survenue lors de l\'ajout de la frais';
    }
}

require_once "../views/view-newfrais.php";
