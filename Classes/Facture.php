<?php

namespace Classes;
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

    private $pdo;

    public function __construct($FactureID, $CompteurID, $DateFacture, $Consomation, $DateLimite, $Statut, $DatePaiement, $DateCreation, $CreatedBy)
    {
        $this->FactureID = $FactureID;
        $this->CompteurID = $CompteurID;
        $this->DateFacture = $DateFacture;
        $this->Consomation = $Consomation;
        $this->DateLimite = $DateLimite;
        $this->Statut = $Statut;
        $this->DatePaiement = $DatePaiement;
        $this->DateCreation = $DateCreation;
        $this->CreatedBy = $CreatedBy;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addFacture()
    {
        $sql = "INSERT INTO `Facture` (`CompteurID`, `DateFacture`, `Consomation`, `DateLimite`, `Statut`, `DatePaiement`, `DateCreation`, `CreatedBy`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->CompteurID, $this->DateFacture, $this->Consomation, $this->DateLimite, $this->Statut, $this->DatePaiement, $this->DateCreation, $this->CreatedBy]);
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

    public function getAvailableFactureToPay($compteurID)
    {
        $sql = "SELECT * FROM `Facture` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        return $stmt->fetchAll();
    }
}