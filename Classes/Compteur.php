<?php

namespace Classes;

use Classes\DB_Connection;
require_once 'vendor/autoload.php';

class Compteur
{
    public $CompteurID;
    public $ClientName;
    public $Address;
    public $dateNaissance;
    public $ElectricalDashNumber;

    private $pdo;

    public function __construct($CompteurID, $ClientName, $Address, $dateNaissance, $ElectricalDashNumber)
    {
        $this->CompteurID = $CompteurID;
        $this->ClientName = $ClientName;
        $this->Address = $Address;
        $this->dateNaissance = $dateNaissance;
        $this->ElectricalDashNumber = $ElectricalDashNumber;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }
    public function addCompteur()
    {
        $sql = "INSERT INTO `Compteur` (`ClientName`, `Address`, `dateNaissance`, `ElectricalDashNumber`) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->client->ClientName, $this->client->Address, $this->client->dateNaissance, $this->ElectricalDashNumber]);
    }

    public function getCompteur($compteurID)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        $result = $stmt->fetch();
        $this->ElectricalDashNumber = $result['ElectricalDashNumber'];
        return $result;
    }

    public function getAllCompteurs()
    {
        $sql = "SELECT * FROM `Compteur`";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function updateCompteur($ElectricalDashNumber)
    {
        $sql = "UPDATE `Compteur` SET `ElectricalDashNumber` = ? WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ElectricalDashNumber, $this->CompteurID]);
    }

    public function deleteCompteur()
    {
        $sql = "DELETE FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->CompteurID]);
    }

    public function login($CompteurID, $dateNaissance)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ? AND `dateNaissance` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$CompteurID, $dateNaissance]);
        return $stmt->fetch() !== false;
    }
}