<?php

namespace Classes;

use Classes\DB_Connection;

class Compteur
{
    public $CompteurID;
    public $ClientName;
    public $Address;
    public $dateNaissance;

    private $pdo;

    public function __construct($CompteurID, $ClientName, $Address, $dateNaissance)
    {
        $this->CompteurID = $CompteurID;
        $this->ClientName = $ClientName;
        $this->Address = $Address;
        $this->dateNaissance = $dateNaissance;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addCompteur()
    {
        $sql = "INSERT INTO `Compteur` (`ClientName`, `Address`, `dateNaissance`) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->ClientName, $this->Address, $this->dateNaissance]);
    }

    public function getCompteur($compteurID)
    {
        $sql = "SELECT * FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$compteurID]);
        return $stmt->fetch();
    }

    public function getAllCompteurs()
    {
        $sql = "SELECT * FROM `Compteur`";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function updateCompteur($ClientName, $Address, $dateNaissance)
    {
        $sql = "UPDATE `Compteur` SET `ClientName` = ?, `Address` = ?, `dateNaissance` = ? WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ClientName, $Address, $dateNaissance, $this->CompteurID]);
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