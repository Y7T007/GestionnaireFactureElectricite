<?php

namespace Classes;

use Classes\DB_Connection;

class Compteur
{
    public $CompteurID;
    public $ClientName;
    public $Address;

    private $pdo;

    public function __construct($CompteurID, $ClientName, $Address)
    {
        $this->CompteurID = $CompteurID;
        $this->ClientName = $ClientName;
        $this->Address = $Address;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addCompteur()
    {
        $sql = "INSERT INTO `Compteur` (`ClientName`, `Address`) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->ClientName, $this->Address]);
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

    public function updateCompteur($ClientName, $Address)
    {
        $sql = "UPDATE `Compteur` SET `ClientName` = ?, `Address` = ? WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ClientName, $Address, $this->CompteurID]);
    }

    public function deleteCompteur()
    {
        $sql = "DELETE FROM `Compteur` WHERE `CompteurID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->CompteurID]);
    }
}

