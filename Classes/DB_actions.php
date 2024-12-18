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
            'ClientsID' => $annualConsumption->getClientsID(),
            'Year' => $annualConsumption->getYear(),
            'Consumption' => $annualConsumption->getConsumption(),
            'DateCreation' => $annualConsumption->getDateCreation()
        ];
        $collection->insertOne($document);
    }

    public function getAnnualConsumption($ClientsID, $year)
    {
        $collection = $this->db->selectCollection('annualConsumption');
        $document = $collection->findOne(['ClientsID' => $ClientsID, 'Year' => $year]);
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
            'ClientsID' => $reclamation->getClientsID(),
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

    // Clients actions
    public function addClients(Clients $Clients)
    {
        $collection = $this->db->selectCollection('users');
        $document = [
            'ClientsID' => $Clients->getClientsID(),
            'ClientName' => $Clients->getClientName(),
            'Address' => $Clients->getAddress()
        ];
        $collection->insertOne($document);
    }

    public function deleteClients($ClientsID)
    {
        $collection = $this->db->selectCollection('users');
        $collection->deleteOne(['ClientsID' => $ClientsID]);
    }

    public function editClients(Clients $Clients)
    {
        $collection = $this->db->selectCollection('users');
        $document = [
            'ClientName' => $Clients->getClientName(),
            'Address' => $Clients->getAddress()
        ];
        $collection->updateOne(['ClientsID' => $Clients->getClientsID()], ['$set' => $document]);
    }

    public function getClients($ClientsID)
    {
        $collection = $this->db->selectCollection('users');
        $document = $collection->findOne(['ClientsID' => $ClientsID]);
        return $document;
    }

    public function getAllClientss()
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
            'ClientsID' => $facture->getClientsID(),
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