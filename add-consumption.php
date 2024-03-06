<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $factureID = $_POST['FactureID'];
}
    $ClientsID = $_SESSION['ClientsID'];


if (!isset($ClientsID)){

    header('Location: login.php');
    exit;

}
require_once 'Classes/Clients.php';
use Classes\Clients;
use Classes\Facture;


// Fetch the Clients for the current logged-in user
$Clients = new Clients($_SESSION['ClientsID'], null, null, null, null);
$userClients = $Clients->getClients($_SESSION['ClientsID']);

// Retrieve the ElectricalDashNumber
$ElectricalDashNumber = $userClients['ElectricalDashNumber'];

$facture = new Facture(null, $_SESSION['ClientsID'], null, null, null, null, null, null, null);
$unpaidFactures = $facture->getUnpaidFactures($_SESSION['ClientsID']);

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/electricity.webp&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Add this month consumption</h4>
                                    </div>
                                    <form class="user" method="POST" action="handle-add-consumption.php" enctype="multipart/form-data">
                                        <div class="mb-3"></div>
                                        <label for="exampleInputPassword-2">Clients ID:</label>
                                        <input class="form-control form-control-user disabled" type="number" value="<?php echo $ClientsID;?>" id="exampleInputPassword-2" name="record-number" placeholder="Clients ID" style="margin-bottom: 13px;margin-top: 13px;" disabled>
                                        <label for="exampleInputPassword-3">Actual Dash number :</label>
                                        <input class="form-control form-control-user" type="number" value="<?php echo $ElectricalDashNumber; ?>" id="exampleInputPassword-3" name="default-number" placeholder="Actual Status Number" style="margin-bottom: 14px;" disabled>
                                        <input class="form-control form-control-user" type="hidden" value="<?php echo $ElectricalDashNumber; ?>" id="exampleInputPassword-3" name="default-number" placeholder="Actual Status Number" style="margin-bottom: 14px;">

                                        <div class="mb-3">
                                            <label for="factureMonth" class="form-label">Facture Month</label>
                                            <select class="form-control" id="factureMonth" name="factureMonth">
                                                <?php foreach ($unpaidFactures as $unpaidFacture): ?>
                                                    <option value="<?php echo date('Y-m', strtotime($unpaidFacture['DateFacture'])); ?>" >
                                                        <?php echo date('F Y', strtotime($unpaidFacture['DateFacture'])); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3"><label class="form-label">Enter this month record on the dash</label>
                                            <input class="form-control form-control-user" type="number" id="monthlyRecord" name="record-number" placeholder="This month record " onfocusout="validateInput()">
                                            <input class="isAnomalie" name="isAnomalie" type="hidden">
                                            <script>
                                                function validateInput() {
                                                    var electricalDashNumber = <?php echo $ElectricalDashNumber; ?>;
                                                    var submitButton = document.querySelector('.btn-user');
                                                    var isAnomalie = document.querySelector('.isAnomalie');

                                                    var monthlyRecord = document.getElementById('monthlyRecord').value;

                                                    if (monthlyRecord < electricalDashNumber) {
                                                        submitButton.disabled = false;
                                                        isAnomalie.value = true;
                                                        alert('The entered value cannot be lower than the Electrical Dash Number.');
                                                    } else {
                                                        isAnomalie.value = false;
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Upload an image of the dashboard</label>
                                            <input type="file" class="form-control" id="image" name="image" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1" required>
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">You accept that any attempt at fraud will lead to legal action against you.</label></div>
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Confirmer</button>
                                        <hr>
                                        <?php
                                        echo '<input type="hidden" name="FactureID" value="' . $factureID . '">';
                                        ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>