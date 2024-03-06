<?php

use Classes\Clients;

require_once 'vendor/autoload.php';
session_start();


$ClientsID = $_POST['ClientsID'];
$dateNaissance = $_POST['dateNaissance'];

$Clients = new Clients($ClientsID, null, null, $dateNaissance,null);

if ($Clients->login($ClientsID, $dateNaissance)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['ClientsID'] = $ClientsID;
    header('Location: index.php');
    exit;
} else {
    // login failed
    $_SESSION['login_error'] = "Incorrect Clients ID or Date of Birth.";
    header('Location: login.php');
    exit;
}