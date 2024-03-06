<?php
require_once 'Classes/Clients.php';
use Classes\Clients;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new client's information from the POST parameters
    $ClientName = $_POST['ClientName'];
    $Address = $_POST['Address'];
    $dateNaissance = $_POST['dateNaissance'];
    $ElectricalDashNumber = $_POST['ElectricalDashNumber'];

    // Create a new Clients object
    $Clients = new Clients(null, $ClientName, $Address, $dateNaissance, $ElectricalDashNumber);

    // Add the new client
    $Clients->addClients();

    // Redirect to the clients page
    header('Location: Admin_clients.php');
    exit;
}

// Display the form for entering the new client's information
?>

<!-- HTML code for the form goes here -->