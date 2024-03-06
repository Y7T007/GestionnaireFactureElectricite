<?php

namespace Classes;

use Classes\DB_Connection;
require_once 'vendor/autoload.php';

class Compteur
{
    public $compteurId;
    public $clientName;
    public $address;
    public $clientBirthDate;
    public $electricalDashNumber;

    private $pdo;

    public function __construct($compteurId, $clientName, $address, $clientBirthDate, $electricalDashNumber)
    {
        $this->compteurId = $compteurId;
        $this->clientName = $clientName;
        $this->address = $address;
        $this->clientBirthDate = $clientBirthDate;
        $this->electricalDashNumber = $electricalDashNumber;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addCompteur()
    {
        $sql = "INSERT INTO `Compteur` (`ClientName`, `Address`, `dateNaissance`, `ElectricalDashNumber`) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->clientName, $this->address, $this->clientBirthDate, $this->electricalDashNumber]);
    }

    public function getCompteur($compteurId)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId]);
        $result = $stmt->fetch();
        $this->electricalDashNumber = $result['ElectricalDashNumber'];
        return $result;
    }

    public function getAllCompteurs()
    {
        $sql = "SELECT * FROM `Compteur`";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function updateCompteur($electricalDashNumber)
    {
        $sql = "UPDATE `Compteur` SET `ElectricalDashNumber` = ? WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$electricalDashNumber, $this->compteurId]);
    }

    public function deleteCompteur()
    {
        $sql = "DELETE FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->compteurId]);
    }

    public function login($compteurId, $clientBirthDate)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ? AND `dateNaissance` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurId, $clientBirthDate]);
        return $stmt->fetch() !== false;
    }
}