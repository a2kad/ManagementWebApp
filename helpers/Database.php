<?php

class Database
{
    public static function createInstancePDO()
    {
        try {
            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER_DATABASE, PASSWORD_DATABASE);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            //echo "Error!: " . $e->getMessage() . "<br/>";
            //die();
            return false;
        }
    }
}
