<?php

namespace Classes;

class Compteur
{

    public $CompteurID;
    public $ClientName;
    public $Address;

//    Constructor
    public function __construct($CompteurID, $ClientName, $Address)
    {
        $this->CompteurID = $CompteurID;
        $this->ClientName = $ClientName;
        $this->Address = $Address;
    }

    public function getCompteurID()
    {
        return $this->CompteurID;
    }

    public function getClientName()
    {
        return $this->ClientName;
    }

    public function getAddress()
    {
        return $this->Address;
    }

    public function setCompteurID($CompteurID)
    {
        $this->CompteurID = $CompteurID;
    }

    public function setClientName($ClientName)
    {
        $this->ClientName = $ClientName;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function __toString()
    {
        return $this->CompteurID . " " . $this->ClientName . " " . $this->Address;
    }

    public function addCompteur(Compteur $compteur)
    {
        // add a Compteur to the database

    }

    public function deleteCompteur($compteurID)
    {
        // Implementation to delete a Compteur from the database
    }

    public function editCompteur(Compteur $compteur)
    {
        // Implementation to edit a Compteur in the database
    }

    public function getCompteur($compteurID)
    {
        // Implementation to get a specific Compteur from the database
    }

    public function getAllCompteurs()
    {
        // Implementation to get all Compteurs from the database
    }

}