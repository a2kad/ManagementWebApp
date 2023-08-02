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
        //var_dump($_POST);
        if($_POST['status'] == 2){
            header("Location: ../controllers/controller-refusefrais.php?refuse=".$_POST['id_frais']);
            exit;
        }else{
        if(Frais::setStatus($_POST['status'], $_GET['id_frais'])){
            header('Location: ../controllers/controller-showfrais.php?id_frais='.$_GET['id_frais']);
            exit;
        }else{
            $error['status'] = 'Statut non modifié';
        }}
    }
}

require_once "../views/view-showfrais.php";