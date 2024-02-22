<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Classes/Facture.php';
use Classes\Facture;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CompteurID = $_SESSION['compteurID'];
    $DateFacture = $_POST['factureMonth'];
    $Consomation = $_POST['record-number'];
    $Default = $_POST['default-number'];
    $DateLimite = date('Y-m-d', strtotime('+1 month'));
    $Statut = 'NV';
    $DateCreation = date('Y-m-d');
    $CreatedBy = 'Y7T007';

    // Retrieve the FactureID of the facture you want to update
    $FactureID = $_POST['FactureID'];

// Retrieve the image from the form data
    $Image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $Image = file_get_contents($_FILES['image']['tmp_name']);
    }

// Create a new instance of the Facture class
    $facture = new Facture($FactureID, $CompteurID, $DateFacture, ($Consomation-$Default), $DateLimite, $Statut, null, $DateCreation, $CreatedBy, $Image);

// Update the facture in the database
    $facture->updateFacture(($Consomation-$Default), $Statut, $Image,$FactureID);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// Print out the $_POST and $_FILES arrays
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    echo '</pre>';

// ... rest of the code
    // Redirect the user back to the factures page
    header('Location: factures.php');
    exit;
}