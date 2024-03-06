<?php
require_once 'Classes/Clients.php';
use Classes\Clients;

// Get the ClientsID from the GET parameters
$ClientsID = $_GET['ClientsID'];

// Create a new Clients object
$Clients = new Clients($ClientsID, null, null, null, null);

// Get the client's current information
$client = $Clients->getClients($ClientsID);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated information from the POST parameters
    $ClientName = $_POST['ClientName'];
    $Address = $_POST['Address'];
    $dateNaissance = $_POST['dateNaissance'];
    $ElectricalDashNumber = $_POST['ElectricalDashNumber'];

    // Update the client's information
    $Clients->updateClients($ClientName, $Address, $dateNaissance, $ElectricalDashNumber);

    // Redirect to the clients page
    header('Location: Admin_clients.php');
    exit;
}

// Display the form with the client's current information
?>

