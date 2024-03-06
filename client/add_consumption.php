<?php

require_once '../Classes/Clients.php';
require_once '../Classes/Facture.php';
require_once '../Classes/Annual_Consumption.php';

use Classes\Clients;
use Classes\Facture;
use Classes\Annual_Consumption;
use Classes\Reclamation;
use Classes\DB_Actions;
use Classes\DB_connection;


// Get the data from the form
//if (isset($_POST['ClientsID']) && isset($_POST['Year']) && isset($_POST['Facture']))
//{
//    $ClientsID = $_POST['ClientsID'];
//    $ClientName = $_POST['ClientName'];
//    $Facture = $_POST['Facture'];
//    $consumption = new Clients($ClientsID, $ClientName, $Facture);
//}

// Create a new instance of the Facture class

// Call the addFacture method
//$consumption->addFacture();

//create new reclamations object:

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
            <label>ClientsID</label>
            <input type="text" name="ClientsID">
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
