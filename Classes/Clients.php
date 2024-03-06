<?php

namespace Classes;

use Classes\DB_Connection;
require_once 'vendor/autoload.php';

class Clients
{
    public $ClientsId;
    public $clientName;
    public $address;
    public $clientBirthDate;
    public $electricalDashNumber;

    private $pdo;

    public function __construct($ClientsId, $clientName, $address, $clientBirthDate, $electricalDashNumber)
    {
        $this->ClientsId = $ClientsId;
        $this->clientName = $clientName;
        $this->address = $address;
        $this->clientBirthDate = $clientBirthDate;
        $this->electricalDashNumber = $electricalDashNumber;
        $DB_connection = new DB_connection();
        $this->pdo = $DB_connection->getPDO();
    }

    public function addClients()
    {
        $sql = "INSERT INTO `Clients` (`ClientName`, `Address`, `dateNaissance`, `ElectricalDashNumber`) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->clientName, $this->address, $this->clientBirthDate, $this->electricalDashNumber]);
    }

    public function getClients($ClientsId)
    {
        $sql = "SELECT * FROM `Clients` WHERE `ClientsID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ClientsId]);
        $result = $stmt->fetch();
        $this->electricalDashNumber = $result['ElectricalDashNumber'];
        return $result;
    }

    public function getAllClientss()
    {
        $sql = "SELECT * FROM `Clients`";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function updateClients($electricalDashNumber)
    {
        $sql = "UPDATE `Clients` SET `ElectricalDashNumber` = ? WHERE `ClientsID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$electricalDashNumber, $this->ClientsId]);
    }

    public function deleteClients()
    {
        $sql = "DELETE FROM `Clients` WHERE `ClientsID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->ClientsId]);
    }

    public function login($ClientsId, $clientBirthDate)
    {
        $sql = "SELECT * FROM `Clients` WHERE `ClientsID` = ? AND `dateNaissance` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ClientsId, $clientBirthDate]);
        return $stmt->fetch() !== false;
    }
}