<?php
require_once 'vendor/autoload.php';
require_once 'Classes/Facture.php';
require_once 'Classes/Compteur.php';
use Classes\Facture;
use Classes\Compteur;

session_start();

    $compteur = new Compteur(null, null, null, null, null);
    $compteurs = $compteur->getAllCompteurs();
    print_r($compteurs);

    foreach ($compteurs as $compteur) {
        echo $compteur['CompteurID'];
        $facture = new Facture(
            $compteur['CompteurID'],
            date('Y-m-d'),
            0,
            date('Y-m-d', strtotime('+1 month')),
            'waiting',
            null,
            date('Y-m-d'),
            null
        );
        $facture->addFacture();
    }

//    header('Location: Admin_Factures.php');
//    exit;
