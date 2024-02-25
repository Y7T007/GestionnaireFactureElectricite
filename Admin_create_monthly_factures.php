<?php
require_once 'vendor/autoload.php';
require_once 'Classes/Facture.php';
require_once 'Classes/Compteur.php';
use Classes\Facture;
use Classes\Compteur;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compteur = new Compteur(null, null, null, null, null);
    $clients = $compteur->getAllCompteurs();

    foreach ($clients as $client) {
        $facture = new Facture(null, $client['CompteurID'], date('Y-m-d'), 0, date('Y-m-d', strtotime('+1 month')), 'waiting', null, date('Y-m-d'), 'Y7T007', null);
        $facture->createFacture();
    }

    header('Location: Admin_Factures.php');
    exit;
}