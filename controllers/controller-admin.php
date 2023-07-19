<?php 
session_start();


$showButtons = true;

if(isset($_SESSION['name'])){
    $showButtons = false;
    
}

require_once "../views/view-admin.php";

