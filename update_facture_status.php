<?php
require_once 'Classes/Facture.php';
use Classes\Facture;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $factureID = $_POST['factureID'];
    $status = $_POST['status'];

    $facture = new Facture(null, null, null, null, null, null, null, null, null);
    $facture->updateFactureStatus($factureID, $status);
}