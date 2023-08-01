<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";
require_once "../models/Frais.php";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    if(isset($_POST['submit'])){
        var_dump($_POST);
        if(Frais::setStatus($_POST['status'], $_GET['user_id'])){
            header('Location: ../controllers/controller-frais.php');
            exit;
        }else{
            $error['status'] = 'Statut non modifié';
        }
    }
}

require_once "../views/view-showfrais.php";