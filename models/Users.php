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
    public static function createUser(array $inputs) :bool
    {
        try{
            $pdo = Database::createInstancePDO();
            $sql = "INSERT INTO `users` (`name`, `lastname`, `email`, `tel`, `password`, `id_type_user`) VALUES (:name, :lastname, :email, :tel, :password, '1');";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', Form::safeData($inputs['name']), PDO::PARAM_STR);
            $stmt->bindValue(':lastname', Form::safeData($inputs['lastname']), PDO::PARAM_STR);
            $stmt->bindValue(':tel', Form::safeData($inputs['tel']),PDO::PARAM_STR);
            $stmt->bindValue(':email', Form::safeData($inputs['email']),PDO::PARAM_STR);
            $stmt->bindValue(':password', password_hash(Form::safeData($inputs['password']), PASSWORD_DEFAULT),PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    public static function getAllUsers(){
        try{
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `users` NATURAL JOIN `type_user`';
            $stmt = $pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e) {
            return false;
        }
    }
}
