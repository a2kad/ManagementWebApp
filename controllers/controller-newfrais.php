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

        $finfo = new finfo(FILEINFO_MIME);

        if(!str_contains($finfo->file($file_tmp), "image")){
            $error['image'] = 'Le fichier n\'est pas une image';
        }
        
        if ($file_size > 2097152) {
            $error['image'] = 'La taille du fichier doit être d\'exactement 2 Mo';
        }
    }
    if (empty($error)) {
        
        $imgFile = file_get_contents($file_tmp);
        $justificatif = base64_encode($imgFile);
        if (Frais::addFrais($_POST['date'], $_POST['ttc'], $_POST['ht'], $justificatif, $_POST['motif'], $_SESSION['user']['id_user'])) {
            

            if (move_uploaded_file($file_tmp, "../assets/files/" . $file_name)) {

                header('Location: ../controllers/controller-verif.php');
                exit;
            } else {
                $error['bdd'] = 'Erreur de téléchargement';
            }
        }else{
            $error['bdd'] = 'Erreur de bdd';
        }
    } else {
        $error['bdd'] = 'Une erreur est survenue lors de l\'ajout de la frais';
    }
}

require_once "../views/view-newfrais.php";
