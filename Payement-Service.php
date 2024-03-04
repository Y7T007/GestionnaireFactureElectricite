<?php
require_once 'Classes/Facture.php';
use Classes\Facture;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug output

    $fID= $_GET['FactureID'];
    // Fetch the facture using the FactureID passed in the GET request
    $facture = new Facture($fID, $_SESSION['compteurID'], null, null, null, null, null, null, null);
    // Update the status of the facture to "paid"
    $facture->payFacture($fID);
    echo 'Facture paid successfully';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Simulation</title>
</head>
<body>
<h2>Payment Service</h2>
<form method="post">
    <label for="name">Name on Card:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="cardnumber">Card Number:</label><br>
    <input type="text" id="cardnumber" name="cardnumber"><br>
    <label for="expdate">Expiry Date:</label><br>
    <input type="text" id="expdate" name="expdate"><br>
    <label for="cvv">CVV:</label><br>
    <input type="text" id="cvv" name="cvv"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>