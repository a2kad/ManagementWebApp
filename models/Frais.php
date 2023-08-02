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
            $sql = 'SELECT * FROM `frais` NATURAL JOIN `users` NATURAL JOIN `type_frais` NATURAL JOIN `status` ORDER BY `id` ASC'; //  
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
            $sql = 'SELECT * FROM `frais` NATURAL JOIN `users` NATURAL JOIN `type_frais` NATURAL JOIN `status` WHERE `id_user` = :user  ORDER BY `id` ASC'; //
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
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }

    public static function addFrais($date, $montant_ttc, $montant_ht, $motif, $justificatif, $id_type, $id_user): bool
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "INSERT INTO `frais` (`date`, `montant_ttc`, `montant_ht`, `motif` , `justificatif`, `id_type`, `id_status`, `id_user`) 
                    VALUES (:date, :montant_ttc, :montant_ht, :motif, :justificatif, :id_type, '3', :id_user);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':date', Form::safeData($date), PDO::PARAM_STR);
            $stmt->bindValue(':montant_ttc', Form::safeData($montant_ttc), PDO::PARAM_STR);
            $stmt->bindValue(':montant_ht', Form::safeData($montant_ht), PDO::PARAM_STR);
            $stmt->bindValue(':motif', Form::safeData($motif), PDO::PARAM_STR);
            $stmt->bindValue(':justificatif', Form::safeData($justificatif), PDO::PARAM_STR);
            $stmt->bindValue(':id_type', Form::safeData($id_type), PDO::PARAM_STR);
            $stmt->bindValue(':id_user', Form::safeData($id_user), PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
    public static function convertImg(string $imgData)
    {
        $file = finfo_open();
        $mimeType = finfo_buffer($file, $imgData, FILEINFO_MIME_TYPE);
        $base64ImgScr = 'data:' . $mimeType . ';base64,' . $imgData;
        return $base64ImgScr;
    }
    public static function getStatus()
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `status`';
            $stmt = $pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
    public static function setStatus(int $status, int $user)
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "UPDATE `frais` SET `id_status` = :status WHERE (`id` = :user)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':status', Form::safeData($status), PDO::PARAM_INT);
            $stmt->bindValue(':user', Form::safeData($user), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
    public static function setStatusRefuse(string $motifRejet, string $dateRejet, int $id_frais)
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = "UPDATE `frais` SET `pay_date` = :dateRejet, `id_status` = 2, `motif_refuse` = :motifRejet WHERE (`id` = :id_frais)"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':motifRejet', Form::safeData($motifRejet), PDO::PARAM_STR);
            $stmt->bindValue(':dateRejet', Form::safeData($dateRejet), PDO::PARAM_STR);
            $stmt->bindValue(':id_frais', Form::safeData($id_frais), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
    public static function getOneFrais(string $user) 
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `frais` NATURAL JOIN `status` NATURAL JOIN `type_frais` NATURAL JOIN `users` WHERE id = :user';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':user', Form::safeData($user), PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
    public static function deletFrais($id_frais){
        try{
            $pdo = Database::createInstancePDO();
            $sql = 'DELETE FROM `frais` WHERE `id` = :id_frais';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id_frais', Form::safeData($id_frais), PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
            return false;
        }
    }
}
