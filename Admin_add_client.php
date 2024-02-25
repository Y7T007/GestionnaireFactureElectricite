<?php
require_once 'Classes/Compteur.php';
use Classes\Compteur;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new client's information from the POST parameters
    $ClientName = $_POST['ClientName'];
    $Address = $_POST['Address'];
    $dateNaissance = $_POST['dateNaissance'];
    $ElectricalDashNumber = $_POST['ElectricalDashNumber'];

    // Create a new Compteur object
    $compteur = new Compteur(null, $ClientName, $Address, $dateNaissance, $ElectricalDashNumber);

    // Add the new client
    $compteur->addCompteur();

    // Redirect to the clients page
    header('Location: Admin_clients.php');
    exit;
}

// Display the form for entering the new client's information
?>

<!-- HTML code for the form goes here -->