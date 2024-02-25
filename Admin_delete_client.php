<?php
require_once 'Classes/Compteur.php';
use Classes\Compteur;

// Get the CompteurID from the GET parameters
$CompteurID = $_GET['CompteurID'];

// Create a new Compteur object
$compteur = new Compteur($CompteurID, null, null, null, null);

// Delete the client
$compteur->deleteCompteur();

// Redirect to the clients page
header('Location: Admin_clients.php');
exit;