<?php
require_once 'Classes/Facture.php';
use Classes\Facture;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a new Facture object
    $facture = new Facture(null, null, null, null, null, null, null, null, null);

    // Check if the request is to update the facture status
    if (isset($_POST['factureID']) && isset($_POST['status'])) {
        $factureID = $_POST['factureID'];
        $status = $_POST['status'];
        $facture->updateFactureStatus($factureID, $status);
    }

    // Check if the request is to update the facture details
    if (isset($_POST['factureID']) && isset($_POST['data'])) {
        // Get the JSON data from the request
        $json = $_POST['data'];
        $data = json_decode($json, true);

        // Get the facture ID from the request
        $factureID = $_POST['factureID'];

        // Update the facture in the database ($consomation, $statut, $image, $factureId)
        $facture->updateFactureConsumption($factureID,$data['consomation']);
    }
}