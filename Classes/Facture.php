<?php

namespace Classes;
use PDO;

require_once 'vendor/autoload.php';

class Facture
{
    public $FactureID;
    public $CompteurID;
    public $DateFacture;
    public $Consomation;
    public $DateLimite;
    public $Statut;
    public $DatePaiement;
    public $DateCreation;
    public $CreatedBy;
    public $Image;

    private $pdo;

    public function __construct($CompteurID, $DateFacture, $Consomation, $DateLimite, $Statut, $DatePaiement, $DateCreation, $CreatedBy, $Image = null)
    {
        $this->CompteurID = $CompteurID;
        $this->DateFacture = $DateFacture;
        $this->Consomation = $Consomation;
        $this->DateLimite = $DateLimite;
        $this->Statut = $Statut;
        $this->DatePaiement = $DatePaiement;
        $this->DateCreation = $DateCreation;
        $this->CreatedBy = $CreatedBy;
        $this->Image = $Image;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addFacture()
    {
        $sql = "INSERT INTO `Facture` (`CompteurID`, `DateFacture`, `Consomation`, `DateLimite`, `Statut`, `DatePaiement`, `DateCreation`, `CreatedBy`, `Image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->CompteurID, $this->DateFacture, $this->Consomation, $this->DateLimite, $this->Statut, $this->DatePaiement, $this->DateCreation, $this->CreatedBy, $this->Image]);
    }
    public function getFacture($factureID)
    {
        $sql = "SELECT * FROM `Facture` WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$factureID]);
        return $stmt->fetch();
    }

    public function getAllFactures()
    {
        $sql = "SELECT * FROM `Facture`";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function payFacture($paymentDate)
    {
        $sql = "UPDATE `Facture` SET `DatePaiement` = ?, `Statut` = 'Paid' WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$paymentDate, $this->FactureID]);
    }

    public function getAnnualFacture($compteurID, $year)
    {
        $sql = "SELECT SUM(`Consomation`) as annualFacture FROM `Facture` WHERE `CompteurID` = ? AND YEAR(`DateFacture`) = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID, $year]);
        return $stmt->fetch()['annualFacture'];
    }
    public function getAnnualFacturation($compteurID, $year)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ? AND YEAR(`DateFacture`) = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID, $year]);
        $result = $stmt->fetchAll();
        return $result ? $result : []; // Return an empty array if there are no matching records
    }
    public function getAvailableFactureToPay($compteurID)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        return $stmt->fetchAll();
    }
    public function getUnpaidFactures($compteurID)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ? AND `Statut` = 'waiting'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        return $stmt->fetchAll();
    }
    public function updateFacture($Consomation, $Statut, $Image,$FactureID)
    {
        try {
            $sql = "UPDATE `Facture` SET `Consomation` = ?, `Statut` = ?, `Image` = ? WHERE `FactureID` = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$Consomation, $Statut, $Image, $FactureID]);
        } catch (PDOException $e) {
            // Handle the exception appropriately (log, show error page, etc.)
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public function updateFactureStatus($factureID, $status)
    {
        $sql = "UPDATE `Facture` SET `Statut` = ? WHERE `FactureID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $factureID]);
    }
}