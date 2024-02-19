<?php

namespace Classes;

class Reclamation
{

        public $ReclamationID;
        public $CompteurID;
        public $Type_reclamation   ;
        public $DateReclamation;
        public $Content_reclamation;
        public $Statut;
        public $DateCreation;
        public $Reponse_reclamation;

//    Constructor
    public function __construct($ReclamationID, $CompteurID, $Type_reclamation, $DateReclamation, $Content_reclamation, $Statut, $DateCreation)
    {
        $this->ReclamationID = $ReclamationID;
        $this->CompteurID = $CompteurID;
        $this->Type_reclamation = $Type_reclamation;
        $this->DateReclamation = $DateReclamation;
        $this->Content_reclamation = $Content_reclamation;
        $this->Statut = $Statut;
        $this->DateCreation = $DateCreation;
    }

    public function getReclamationID()
    {
        return $this->ReclamationID;
    }

    public function getCompteurID()
    {
        return $this->CompteurID;
    }

    public function getType_reclamation()
    {
        return $this->Type_reclamation;
    }

    public function getDateReclamation()
    {
        return $this->DateReclamation;
    }

    public function getContent_reclamation()
    {
        return $this->Content_reclamation;
    }

    public function getStatut()
    {
        return $this->Statut;
    }
    public function getDateCreation()
    {
        return $this->DateCreation;
    }
    public function getReponse_reclamation()
    {
        return $this->Reponse_reclamation;
    }
    public function setReponse_reclamation($Reponse_reclamation)
    {
        $this->Reponse_reclamation = $Reponse_reclamation;
    }

    public function addReclamation()
    {
        // Implementation to add the current Reclamation instance to the database
    }

    public function getReclamation($reclamationID)
    {
        // Implementation to get a specific Reclamation from the database
    }

    public static function getAllReclamations()
    {
        // Implementation to get all Reclamations from the database
    }

    public function answerReclamation($reponse)
    {
        // Implementation to set the response for the current Reclamation instance
    }

    public function sendNotification()
    {
        // Implementation to send a notification related to the current Reclamation instance
    }
}