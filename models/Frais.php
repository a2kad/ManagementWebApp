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
}
