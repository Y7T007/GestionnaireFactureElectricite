<?php
require_once 'Classes/Clients.php';
use Classes\Clients;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ClientName = $_POST['ClientName'];
    $Address = $_POST['Address'];
    $dateNaissance = $_POST['dateNaissance'];
    $ElectricalDashNumber = $_POST['ElectricalDashNumber'];

    $Clients = new Clients(null, $ClientName, $Address, $dateNaissance, $ElectricalDashNumber);

    $Clients->addClients();

    header('Location: Admin_clients.php');
    exit;
}
?>
