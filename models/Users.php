<?php

class Users
{
    private $id_user;
    private $name;
    private $lastname;
    private $email;
    private $tel;
    private $password;
    private $id_type_user;

    public static function checkLogin(string $login): bool
    {

        try {
            $pdo = Database::createInstancePDO();
            $sql = "SELECT * FROM `users` WHERE `email` = :email";
            $stmt = $pdo->prepare($sql); // on prepare la requete
            $stmt->bindValue(':email', Form::safeData($login), PDO::PARAM_STR);
            $stmt->execute();
            $stmt->rowCount() != 0 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    
    public static function checkPassword(string $login, string $password): bool
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "SELECT * FROM `users` WHERE `email` = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', Form::safeData($login), PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $result['password'])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    public static function getUser($email)
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "SELECT * FROM `users` WHERE `email` = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            
            return false;
        }
    }
}
