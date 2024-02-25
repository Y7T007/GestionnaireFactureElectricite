<?php
require_once 'vendor/autoload.php';
require_once 'Classes/Annual_Consumption.php';
require_once 'Classes/Facture.php'; // Include the Facture class
use Classes\Annual_Consumption;
use Classes\Facture; // Use the Facture class

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = fopen($_FILES['file']['tmp_name'], 'r');

        while (($line = fgetcsv($file)) !== FALSE) {
            $annual_consumption = new Annual_Consumption($line[0], $line[1], $line[2], $line[3]);
            $annual_consumption->addAnnualConsumption();

            // Create a new Facture object
            $facture = new Facture(null, null, null, null, null, null, null, null, null);

            // Get all the factures for the given client and year
            $factures = $facture->getAnnualFacturation($line[0], $line[1]);

            // Calculate the sum of the consumption of these factures
            $sum = array_sum(array_column($factures, 'Consomation'));

            // Compare the sum with the annual consumption value from the text file
            if (abs($sum - $line[2]) > 50) {
                // Store the client's data in a session variable
                $_SESSION['violating_clients'][] = $line;
            }
        }

        fclose($file);
    }

    header('Location: Admin_Factures.php');
    exit;
}