<?php

namespace Classes;

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

//    Constructor
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
    }

    public function getFactureID()
    {
        return $this->FactureID;
    }

    public function getCompteurID()
    {
        return $this->CompteurID;
    }

    public function getDateFacture()
    {
        return $this->DateFacture;
    }

    public function getConsomation()
    {
        return $this->Consomation;
    }

    public function getDateLimite()
    {
        return $this->DateLimite;
    }

    public function getStatut()
    {
        return $this->Statut;
    }

    public function getDatePaiement()
    {
        return $this->DatePaiement;
    }

    public function getDateCreation()
    {
        return $this->DateCreation;
    }

    public function getCreatedBy()
    {
        return $this->CreatedBy;
    }

    public function setFactureID($FactureID)
    {
        $this->FactureID = $FactureID;
    }

    public function setCompteurID($CompteurID)
    {
        $this->CompteurID = $CompteurID;
    }

    public function setDateFacture($DateFacture)
    {
        $this->DateFacture = $DateFacture;
    }

    public function setConsomation($Consomation)
    {
        $this->Consomation = $Consomation;
    }

    public function setDateLimite($DateLimite)
    {
        $this->DateLimite = $DateLimite;
    }

    public function setStatut ($Statut)
    {
        $this->Statut = $Statut;
    }

    public function addFacture()
    {
        // Implementation to add the current Facture instance to the database
    }

    public function getFacture($factureID)
    {
        // Implementation to get a specific Facture from the database
    }

    public static function getAllFactures()
    {
        // Implementation to get all Factures from the database
    }

    public function payFacture($paymentDate)
    {
        // Implementation to mark the Facture as paid and set the payment date
    }


}