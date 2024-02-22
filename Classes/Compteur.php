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
    public $ElectricalDashNumber; // New attribute

    private $pdo;

    public function __construct($CompteurID, $ClientName, $Address, $dateNaissance, $ElectricalDashNumber) // Updated constructor
    {
        $this->CompteurID = $CompteurID;
        $this->ClientName = $ClientName;
        $this->Address = $Address;
        $this->dateNaissance = $dateNaissance;
        $this->ElectricalDashNumber = $ElectricalDashNumber; // Assign the new attribute
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addCompteur()
    {
        $sql = "INSERT INTO `Compteur` (`ClientName`, `Address`, `dateNaissance`, `ElectricalDashNumber`) VALUES (?, ?, ?, ?)"; // Updated SQL query
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->ClientName, $this->Address, $this->dateNaissance, $this->ElectricalDashNumber]); // Updated execute method
    }

    public function getCompteur($compteurID)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        $result = $stmt->fetch();
        $this->ElectricalDashNumber = $result['ElectricalDashNumber']; // Fetch the new attribute
        return $result;
    }

    public function getAllCompteurs()
    {
        $sql = "SELECT * FROM `Compteur`";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        foreach ($results as $result) {
            $result['ElectricalDashNumber'] = $result['ElectricalDashNumber']; // Fetch the new attribute
        }
        return $results;
    }

    public function updateCompteur($ClientName, $Address, $dateNaissance, $ElectricalDashNumber) // Updated method
    {
        $sql = "UPDATE `Compteur` SET `ClientName` = ?, `Address` = ?, `dateNaissance` = ?, `ElectricalDashNumber` = ? WHERE `CompteurID` = ?"; // Updated SQL query
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ClientName, $Address, $dateNaissance, $ElectricalDashNumber, $this->CompteurID]); // Updated execute method
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