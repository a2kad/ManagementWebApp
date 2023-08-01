<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";
require_once "../models/Frais.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(isset($_POST['del'])){
        var_dump($_POST);
        if(Frais::deletFrais($_POST['del'])){
            header("Location: ../controllers/controller-frais.php");
            exit;
        }
        else{
            var_dump($_POST);
        }
    }
}

require_once "../views/view-frais.php";