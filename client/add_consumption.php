<?php

require_once '../Classes/Compteur.php';
require_once '../Classes/Facture.php';
require_once '../Classes/Annual_Consumption.php';

use Classes\Compteur;
use Classes\Facture;
use Classes\Annual_Consumption;

// Get the data from the form
if (isset($_POST['CompteurID']) && isset($_POST['Year']) && isset($_POST['Facture']))
{
    $CompteurID = $_POST['CompteurID'];
    $ClientName = $_POST['ClientName'];
    $Facture = $_POST['Facture'];
    $consumption = new Compteur($CompteurID, $ClientName, $Facture);
}

// Create a new instance of the Facture class

// Call the addFacture method
//$consumption->addFacture();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Facture Added</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <div class="header">
            <h2>Facture Added</h2>
        </div>
        <div class="content">
            <p>Facture has been added successfully</p>
            <a href="add_consumption.php">Add another consumption</a>
        </div>

    <form action="add_consumption.php" method="post">
        <div class="input-group">
            <label>CompteurID</label>
            <input type="text" name="CompteurID">
        </div>
        <div class="input-group">
            <label>Year</label>
            <input type="text" name="Year">
        </div>
        <div class="input-group">
            <label>Facture</label>
            <input type="text" name="Facture">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="add_consumption">Add consumption</button>
        </div>
    </form>
    </body>
