<?php

namespace Classes;

use PDO;
use PDOException;

require_once 'vendor/autoload.php';

class Facture
{
    public $factureId;
    public $compteurId;
    public $dateFacture;
    public $consomation;
    public $dateLimite;
    public $statut;
    public $datePaiement;
    public $dateCreation;
    public $createdBy;
    public $image;

    private $pdo;

    public function __construct($compteurId, $dateFacture, $consomation, $dateLimite, $statut, $datePaiement, $dateCreation, $createdBy, $image = null)
    {
        $this->compteurId = $compteurId;
        $this->dateFacture = $dateFacture;
        $this->consomation = $consomation;
        $this->dateLimite = $dateLimite;
        $this->statut = $statut;
        $this->datePaiement = $datePaiement;
        $this->dateCreation = $dateCreation;
        $this->createdBy = $createdBy;
        $this->image = $image;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addFacture()
    {
        $sql = "INSERT INTO `Facture` (`CompteurID`, `DateFacture`, `Consomation`, `DateLimite`, `Statut`, `DatePaiement`, `DateCreation`, `CreatedBy`, `Image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->compteurId, $this->dateFacture, $this->consomation, $this->dateLimite, $this->statut, $this->datePaiement, $this->dateCreation, $this->createdBy, $this->image]);
    }

    public function getFacture($factureId)
    {
        $sql = "SELECT * FROM `Facture` WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$factureId]);
        return $stmt->fetch();
    }

    public function getAllFactures()
    {
        $sql = "SELECT * FROM `Facture`";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function payFacture($id)
    {
        $sql = "UPDATE `Facture` SET  `Statut` = 'paid' WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);

        // Enable error reporting
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            // If there's an error, print it out
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAnnualFacture($compteurId, $year)
    {
        $sql = "SELECT SUM(`Consomation`) as annualFacture FROM `Facture` WHERE `CompteurID` = ? AND YEAR(`DateFacture`) = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId, $year]);
        return $stmt->fetch()['annualFacture'];
    }

    public function getAnnualFacturation($compteurId, $year)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ? AND YEAR(`DateFacture`) = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId, $year]);
        $result = $stmt->fetchAll();
        return $result ? $result : []; // Return an empty array if there are no matching records
    }

    public function getAvailableFactureToPay($compteurId)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId]);
        return $stmt->fetchAll();
    }

    public function getUnpaidFactures($compteurId)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ? AND `Statut` = 'waiting'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId]);
        return $stmt->fetchAll();
    }

    public function updateFacture($consomation, $statut, $image, $factureId)
    {
        try {
            $sql = "UPDATE `Facture` SET `Consomation` = ?, `Statut` = ?, `Image` = ? WHERE `FactureID` = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$consomation, $statut, $image, $factureId]);
        } catch (PDOException $e) {
            // Handle the exception appropriately (log, show error page, etc.)
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function updateFactureStatus($factureId, $status)
    {
        $sql = "UPDATE `Facture` SET `Statut` = ? WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $factureId]);
    }

    public function getUserFactures($compteurId)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId]);
        return $stmt->fetchAll();
    }
}