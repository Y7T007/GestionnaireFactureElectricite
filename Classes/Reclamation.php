<?php

namespace Classes;

class Reclamation
{

    public $ReclamationID;
    public $CompteurID;
    public $Type_reclamation;
    public $DateReclamation;
    public $Content_reclamation;
    public $Statut;
    public $DateCreation;
    public $Reponse_reclamation;
    private $pdo;

    public function __construct($ReclamationID, $CompteurID, $Type_reclamation, $DateReclamation, $Content_reclamation, $Statut, $DateCreation)
    {
        $this->ReclamationID = $ReclamationID;
        $this->CompteurID = $CompteurID;
        $this->Type_reclamation = $Type_reclamation;
        $this->DateReclamation = $DateReclamation;
        $this->Content_reclamation = $Content_reclamation;
        $this->Statut = $Statut;
        $this->DateCreation = $DateCreation;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function getReclamationID()
    {
        return $this->ReclamationID;
    }

    public function getCompteurID()
    {
        return $this->CompteurID;
    }

    public function getType_reclamation()
    {
        return $this->Type_reclamation;
    }

    public function getDateReclamation()
    {
        return $this->DateReclamation;
    }

    public function getContent_reclamation()
    {
        return $this->Content_reclamation;
    }

    public function getStatut()
    {
        return $this->Statut;
    }

    public function getDateCreation()
    {
        return $this->DateCreation;
    }

    public function getReponse_reclamation()
    {
        return $this->Reponse_reclamation;
    }

    public function setReponse_reclamation($Reponse_reclamation)
    {
        $this->Reponse_reclamation = $Reponse_reclamation;
    }

    public function addReclamation()
    {
        $sql = "INSERT INTO `Reclamation` (`CompteurID`, `Type_reclamation`, `DateReclamation`, `Content_reclamation`, `Statut`, `DateCreation`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->CompteurID, $this->Type_reclamation, $this->DateReclamation, $this->Content_reclamation, $this->Statut, $this->DateCreation]);
    }

    public function getReclamation($reclamationID)
    {
        $sql = "SELECT * FROM `Reclamation` WHERE `ReclamationID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$reclamationID]);
        return $stmt->fetch();
    }
    public function getAllReclamationsByQuery($searchQuery = null)
    {
        $sql = "SELECT * FROM `Reclamation`";

        // If a search query is provided, add a WHERE clause to the SQL query
        if ($searchQuery !== null) {
            $sql .= " WHERE `Content_reclamation` LIKE ?";
        }

        // Add an ORDER BY clause to the SQL query to sort the results by the Statut column
        $sql .= " ORDER BY `Statut` ASC";

        $stmt = $this->pdo->prepare($sql);

        // If a search query is provided, execute the statement with the search query as a parameter
        if ($searchQuery !== null) {
            $stmt->execute(["%$searchQuery%"]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll();
    }

    public function getAllReclamations()
    {
        $sql = "select * from reclamation";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    public function answerReclamation($reponse)
    {
        $sql = "UPDATE `Reclamation` SET `Reponse_reclamation` = ?, `Statut` = 'responded' WHERE `ReclamationID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$reponse, $this->ReclamationID]);
    }


    public function sendNotification()
    {
        // This is a placeholder. You'll need to implement this based on how you want to send notifications.
        // For example, you might want to send an email, in which case you'd use the PHP mail() function.
    }

    public function getPendingReclamations($compteurID)
    {
        $sql = "SELECT COUNT(*) as pendingReclamations FROM `Reclamation` WHERE `CompteurID` = ? AND `Statut` = 'Pending'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        return $stmt->fetch()['pendingReclamations'];
    }
}