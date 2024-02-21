<?php

namespace Classes;

use MongoDB\Client;
use MongoDB\Driver\ServerApi;
use MongoDB\Driver\Exception\Exception;

use Classes\DB_connection;

class DB_Actions
{
    private $client;
    private $db;

    public function __construct()
    {
        $dbConnection = new DB_connection();
        $this->client = $dbConnection->getClient();
        $this->db = $this->client->selectDatabase('GestFactureElectricite');
    }

    // Annual_Consumption actions
    public function addAnnualConsumption(Annual_Consumption $annualConsumption)
    {
        $collection = $this->db->selectCollection('GestFactureElectricite.annualConsumption');
        $document = [
            'CompteurID' => $annualConsumption->getCompteurID(),
            'Year' => $annualConsumption->getYear(),
            'Consumption' => $annualConsumption->getConsumption(),
            'DateCreation' => $annualConsumption->getDateCreation()
        ];
        $collection->insertOne($document);
    }

    public function getAnnualConsumption($compteurID, $year)
    {
        $collection = $this->db->selectCollection('annualConsumption');
        $document = $collection->findOne(['CompteurID' => $compteurID, 'Year' => $year]);
        return $document;
    }

    public function getAllAnnualConsumptions()
    {
        $collection = $this->db->selectCollection('annualConsumption');
        $documents = $collection->find();
        return $documents;
    }

    // Reclamation actions
    public function DBaddReclamation(Reclamation $reclamation)
    {
        $collection = $this->db->selectCollection('reclamations');
        $document = [
            'ReclamationID' => $reclamation->getReclamationID(),
            'CompteurID' => $reclamation->getCompteurID(),
            'Type_reclamation' => $reclamation->getType_reclamation(),
            'DateReclamation' => $reclamation->getDateReclamation(),
            'Content_reclamation' => $reclamation->getContent_reclamation(),
            'Statut' => $reclamation->getStatut(),
            'DateCreation' => $reclamation->getDateCreation(),
            'Reponse_reclamation' => $reclamation->getReponse_reclamation()
        ];
        $collection->insertOne($document);
    }

    public function getReclamation($reclamationID)
    {
        $collection = $this->db->selectCollection('reclamations');
        $document = $collection->findOne(['ReclamationID' => $reclamationID]);
        return $document;
    }

    public function getAllReclamations()
    {
        $collection = $this->db->selectCollection('reclamations');
        $documents = $collection->find();
        return $documents;
    }

    public function answerReclamation($reclamationID, $response)
    {
        $collection = $this->db->selectCollection('reclamations');
        $collection->updateOne(['ReclamationID' => $reclamationID], ['$set' => ['Reponse_reclamation' => $response]]);
    }

    // Compteur actions
    public function addCompteur(Compteur $compteur)
    {
        $collection = $this->db->selectCollection('users');
        $document = [
            'CompteurID' => $compteur->getCompteurID(),
            'ClientName' => $compteur->getClientName(),
            'Address' => $compteur->getAddress()
        ];
        $collection->insertOne($document);
    }

    public function deleteCompteur($compteurID)
    {
        $collection = $this->db->selectCollection('users');
        $collection->deleteOne(['CompteurID' => $compteurID]);
    }

    public function editCompteur(Compteur $compteur)
    {
        $collection = $this->db->selectCollection('users');
        $document = [
            'ClientName' => $compteur->getClientName(),
            'Address' => $compteur->getAddress()
        ];
        $collection->updateOne(['CompteurID' => $compteur->getCompteurID()], ['$set' => $document]);
    }

    public function getCompteur($compteurID)
    {
        $collection = $this->db->selectCollection('users');
        $document = $collection->findOne(['CompteurID' => $compteurID]);
        return $document;
    }

    public function getAllCompteurs()
    {
        $collection = $this->db->selectCollection('users');
        $documents = $collection->find();
        return $documents;
    }

    // Facture actions
    public function addFacture(Facture $facture)
    {
        $collection = $this->db->selectCollection('factures');
        $document = [
            'FactureID' => $facture->getFactureID(),
            'CompteurID' => $facture->getCompteurID(),
            'DateFacture' => $facture->getDateFacture(),
            'Consomation' => $facture->getConsomation(),
            'DateLimite' => $facture->getDateLimite(),
            'Statut' => $facture->getStatut(),
            'DatePaiement' => $facture->getDatePaiement(),
            'DateCreation' => $facture->getDateCreation(),
            'CreatedBy' => $facture->getCreatedBy()
        ];
        $collection->insertOne($document);
    }

    public function getFacture($factureID)
    {
        $collection = $this->db->selectCollection('factures');
        $document = $collection->findOne(['FactureID' => $factureID]);
        return $document;
    }

    public function getAllFactures()
    {
        $collection = $this->db->selectCollection('factures');
        $documents = $collection->find();
        return $documents;
    }

    public function payFacture($factureID, $paymentDate)
    {
        $collection = $this->db->selectCollection('factures');
        $collection->updateOne(['FactureID' => $factureID], ['$set' => ['DatePaiement' => $paymentDate, 'Statut' => 'Paid']]);
    }
}