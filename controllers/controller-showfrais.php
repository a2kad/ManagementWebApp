<?php 
session_start();
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Users.php";
require_once "../models/Frais.php";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    
    
}

require_once "../views/view-showfrais.php";