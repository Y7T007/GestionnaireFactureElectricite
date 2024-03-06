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
        // Implementation to add the current Annual_Consumption instance to the database
    }

    public function getAnnualConsumption()
    {
        // Implementation to get a specific Annual_Consumption from the database
    }

    public static function getAllAnnualConsumptions()
    {
        // Implementation to get all Annual_Consumptions from the database
    }

}