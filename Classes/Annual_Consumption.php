<?php

namespace Classes;

class Annual_Consumption
{
    public $ClientsID;
    public $Year;
    public $Consumption;
    public $DateCreation;

    public function __construct($ClientsID, $Year, $Consumption)
    {
        $this->ClientsID = $ClientsID;
        $this->Year = $Year;
        $this->Consumption = $Consumption;
    }

    public function getClientsID()
    {
        return $this->ClientsID;
    }

    public function getYear()
    {
        return $this->Year;
    }

    public function getConsumption()
    {
        return $this->Consumption;
    }

    public function getDateCreation()
    {
        return $this->DateCreation;
    }

    public function setDateCreation($DateCreation)
    {
        $this->DateCreation = $DateCreation;
    }

    public function addAnnualConsumption()
    {
        $db = new DB_Connection();
        $pdo = $db->getPDO();

        $sql = "INSERT INTO annual_consumption (ClientsID, Year, Consumption, DateCreation) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->ClientsID, $this->Year, $this->Consumption, $this->DateCreation]);
    }

    public function getAnnualConsumption()
    {
        // Implementation to get a specific Annual_Consumption from the database
    }

 public static function getAllAnnualConsumptions()
{
    $db = new DB_Connection();
    $pdo = $db->getPDO();

    $sql = "SELECT * FROM annual_consumption";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

}