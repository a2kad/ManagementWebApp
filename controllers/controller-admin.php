<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";

$showButtons = true;

if(isset($_SESSION['name'])){
    $showButtons = false;
    
}

require_once "../views/view-admin.php";

