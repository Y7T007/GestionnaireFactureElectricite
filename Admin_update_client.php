<?php
require_once 'Classes/Compteur.php';
use Classes\Compteur;

// Get the CompteurID from the GET parameters
$CompteurID = $_GET['CompteurID'];

// Create a new Compteur object
$compteur = new Compteur($CompteurID, null, null, null, null);

// Get the client's current information
$client = $compteur->getCompteur($CompteurID);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated information from the POST parameters
    $ClientName = $_POST['ClientName'];
    $Address = $_POST['Address'];
    $dateNaissance = $_POST['dateNaissance'];
    $ElectricalDashNumber = $_POST['ElectricalDashNumber'];

    // Update the client's information
    $compteur->updateCompteur($ClientName, $Address, $dateNaissance, $ElectricalDashNumber);

    // Redirect to the clients page
    header('Location: Admin_clients.php');
    exit;
}

// Display the form with the client's current information
?>

