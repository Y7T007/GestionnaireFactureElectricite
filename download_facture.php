<?php
require 'vendor/autoload.php'; // Include Dompdf autoloader
require_once 'Classes/Facture.php';
require_once 'Classes/Clients.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use Classes\Facture;
use Classes\Clients;

// Function to generate the PDF
function generatePDF($html, $filename) {
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('isFontSubsettingEnabled', true); // Add this line
    $options->set('tempDir', '/path/to/temp/directory'); // Replace with an actual path



    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    // Set paper size (A4 is used in this example)
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (first save it to a variable)
    $dompdf->render();

    // Save PDF to the server or download it
    $dompdf->stream($filename);
}

isset($_GET['invoice_id']) ? $factureID = $_GET['invoice_id'] : $invoice_id = 1;

// Instantiate the Facture class and get the facture details
$facture = new Facture(null, null, null, null, null, null, null, null, null);
$factureDetails = $facture->getFacture($factureID);

// Instantiate the Clients class and get the client details
$client = new Clients($factureDetails['ClientsID'], null, null, null, null);
$clientDetails = $client->getClients($factureDetails['ClientsID']);
$t1=0;
$t2=0;
$t3=0;
if ($factureDetails['Consomation'] <= 100) {
    $billing = $factureDetails['Consomation'] * 0.8;
    $t1= $factureDetails['Consomation'];
    $t2= 0;
    $t3= 0;
} elseif ($factureDetails['Consomation'] <= 200) {
    $billing = ($factureDetails['Consomation']-100) * 0.9 + 80;
    $t1= 100;
    $t2= $factureDetails['Consomation']-100;
    $t3= 0;

} else {
    $billing = ($factureDetails['Consomation']-200) + 90 + 80;
    $t1= 100;
    $t2= 100;
    $t3= $factureDetails['Consomation']-200;
}
$s1=$t1*0.8;
$s2=$t2*0.9;
$total= $s1+$s2+$t3;
$tva= $total*0.14;
$ttc = $total*1.14;
//echo $ttc;
// HTML template for the invoice



// Check if all required values are not null
if (
    $factureDetails['FactureID'] !== null &&
    $factureDetails['DateFacture'] !== null &&
    $clientDetails['ClientName'] !== null &&
    $clientDetails['Address'] !== null &&
    $t1 !== null &&
    $t2 !== null &&
    $t3 !== null &&
    $s1 !== null &&
    $s2 !== null &&
    $total !== null &&
    $ttc !== null &&
    $factureDetails['Consomation'] !== null
) {
    // HTML template for the invoice
    $html = <<<HTML
<!DOCTYPE html>
<html lang="en">

<body>

    <section id="invoice">
        <div class="container my-5 py-5">

            <div class="text-center border-top border-bottom my-5 py-3">
                <p class="m-0">Facture No: {$factureDetails['FactureID']}</p>
                <p class="m-0">Facture Date: {$factureDetails['DateFacture']}</p>
            </div>

            <div class="d-md-flex justify-content-between">
                <div>
                    <p class="text-primary">Facture To</p>
                    <h4>{$clientDetails['ClientName']}</h4>
                    <ul class="list-unstyled">
                        <li>{$clientDetails['Address']}</li>
                    </ul>
                </div>
                <div class="mt-5 mt-md-0">
                    <p class="text-primary">Facture From</p>
                    <ul class="list-unstyled">
                        <li>Y7T007 Company - Electricity</li>
                        <li>info@Y7T007.com</li>
                        <li>123 Casablanca, Morocoo</li>
                    </ul>
                </div>
            </div>

            <table class="table border my-5">
                <thead>
                    <tr class="bg-primary-subtle">
                        <th scope="col">No.</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Tranche 1</td>
                        <td>0.8 Dhs/kw</td>
                        <td> {$t1}</td>
                        <td>{$s1} Dhs</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Tranche 2</td>
                        <td>0.9 Dhs/kw</td>
                        <td> {$t2}</td>
                        <td>{$s2} Dhs</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Tranche 3</td>
                        <td>1 Dhs/kw</td>
                        <td> {$t3}</td>
                        <td>{$t3} Dhs</td>
                    </tr>

                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td class="">Sub-Total</td>
                        <td> {$total} Dhs</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td class="">TAX 20%</td>
                        <td> {$tva} Dhs</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td class="text-primary fw-bold">Grand-Total </td>
                        <td class="text-primary fw-bold"> {$ttc} Dhs</td>
                    </tr>
                </tbody>
                
                <center>
                <h2>
                Net a Payer : {$ttc} Dhs
</h2>
</center>
            </table>
        </div>
    </section>

</body>

</html>
HTML;

    // Generate and download the PDF
    try {
//        echo $html;
        generatePDF($html, "Facture.pdf");
    } catch (Exception $e) {
        // Display the exception message
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case where some values are null (e.g., display an error message)
    echo "Some required values are null. Cannot generate the PDF.";
}

?>