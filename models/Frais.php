<?php

class Frais
{
    private $id;
    private $date;
    private $montant_ttc;
    private $montant_ht;
    private $justificatif;
    private $motif;
    private $pay_date;
    private $id_type;
    private $id_tva;
    private $id_status;
    private $id_user;

    public static function getAllFrais()
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `frais` NATURAL JOIN `type_frais` NATURAL JOIN `tva` NATURAL JOIN `status` NATURAL JOIN `users`';
            $stmt = $pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function getIndividualFrais($user)
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `frais` NATURAL JOIN `type_frais` NATURAL JOIN `tva` NATURAL JOIN `status` NATURAL JOIN `users` WHERE `id_user` = :user';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':user', Form::safeData($user), PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function getMotif()
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `type_frais`';
            $stmt = $pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function addFrais($date, $montant_ttc, $montant_ht, $justificatif, $id_type, $id_user ) :bool
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "INSERT INTO `frais` (`date`, `montant_ttc`, `montant_ht`, `justificatif`, `id_type`, `id_status`, `id_user`) 
                    VALUES (:date, :montant_ttc, :montant_ht, :justificatif, :id_type, '3', :id_user);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':date', Form::safeData($date), PDO::PARAM_STR);
            $stmt->bindValue(':montant_ttc', Form::safeData($montant_ttc), PDO::PARAM_STR);
            $stmt->bindValue(':montant_ht', Form::safeData($montant_ht), PDO::PARAM_STR);
            $stmt->bindValue(':justificatif', Form::safeData($justificatif), PDO::PARAM_STR);
            $stmt->bindValue(':id_type', Form::safeData($id_type), PDO::PARAM_STR);
            $stmt->bindValue(':id_user', Form::safeData($id_user), PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            return false;
        }
    }
}
