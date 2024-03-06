<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Classes/Facture.php';
use Classes\Facture;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ClientsID = $_SESSION['ClientsID'];
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
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                $Image = "upload/" . $filename;
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["image"]["error"];
    }

    // Create a new instance of the Facture class
    $facture = new Facture($FactureID, $ClientsID, $DateFacture, ($Consomation-$Default), $DateLimite, $Statut, null, $DateCreation, $CreatedBy, $Image);

    // Update the facture in the database
    $facture->updateFacture(($Consomation-$Default), $Statut, $Image,$FactureID);

    // Redirect the user back to the factures page
    header('Location: factures.php');
    exit;
}