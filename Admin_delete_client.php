<?php
require_once 'Classes/Clients.php';
use Classes\Clients;

// Get the ClientsID from the GET parameters
$ClientsID = $_GET['ClientsID'];

// Create a new Clients object
$Clients = new Clients($ClientsID, null, null, null, null);

// Delete the client
$Clients->deleteClients();

// Redirect to the clients page
header('Location: Admin_clients.php');
exit;