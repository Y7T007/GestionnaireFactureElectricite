<?php
require_once 'vendor/autoload.php';
require_once 'Classes/Facture.php';
require_once 'Classes/Clients.php';
use Classes\Facture;
use Classes\Clients;

session_start();

    $Clients = new Clients(null, null, null, null, null);
    $Clientss = $Clients->getAllClientss();
    print_r($Clientss);

    foreach ($Clientss as $Clients) {
        echo $Clients['ClientsID'];
        $facture = new Facture(
            $Clients['ClientsID'],
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

    header('Location: Admin_Factures.php');
    exit;
