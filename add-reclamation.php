<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'Classes/DB_Connection.php';
require_once 'Classes/Reclamation.php';
require_once 'Classes/Facture.php';

use Classes\DB_Connection;
use Classes\Reclamation;
use Classes\Facture;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $content = $_POST['content'];
    $factureId = $_POST['factureId'] ?? null; // Use null coalescing operator to avoid undefined index notice
    $status = 'Pending';
    $dateCreation = date('Y-m-d H:i:s');

    // If the type of the reclamation is "Facture" and a factureId is provided
    if ($type === 'Facture' && $factureId !== null) {
        // Create a new Facture object
        $facture = new Facture(null, $_SESSION['compteurID'], null, null, null, null, null, null, null);
        // Check if the factureId exists in the database
        if ($facture->getFacture($factureId) === false) {
            // Set an error message in a session variable
            $_SESSION['errorMessage'] = 'The factureId does not exist in the database.';
        } else {
            // Format the content of the reclamation
            $content = "{ FactureId:{$factureId} } \n {$content}";
        }
    }

    $dbConnection = new DB_Connection();
    $pdo = $dbConnection->getPDO();

    $reclamation = new Reclamation(null, $_SESSION['compteurID'], $type, null, $content, $status, date('Y-m-d'));
    $reclamation->addReclamation();

    // Redirect to a confirmation page or back to the form
    header('Location: reclamation_finish.php');
    exit;
}
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
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Add new Reclamation</h4>
                                    </div>
                                    <?php if (isset($_SESSION['errorMessage'])): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['errorMessage']; unset($_SESSION['errorMessage']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="POST" action="add-reclamation.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Reclamation type</label>
                                            <select class="form-control form-control-user" id="reclamationType" name="type" required>
                                                <option value="Fuite interne">Fuite interne</option>
                                                <option value="Fuite externe">Fuite externe</option>
                                                <option value="Facture">Facture</option>
                                                <option value="Autre">Autre (à spécifier)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="otherType" style="display: none;">
                                            <label class="form-label">Specify Other Type</label>
                                            <input class="form-control form-control-user" type="text" id="otherTypeInput" name="otherType" placeholder="Specify Other Type">
                                        </div>
                                        <div class="mb-3" id="factureId" style="display: none;">
                                            <label class="form-label">Facture Id</label>
                                            <input class="form-control form-control-user" type="number" id="exampleInputPassword-1" name="factureId" placeholder="Facture ID">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Reclamation content</label>
                                            <input class="form-control form-control-user" type="text" id="exampleInputPassword-2" name="content" placeholder="This month record " required>
                                        </div>
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label">Facture Id</label>-->
<!--                                            <input class="form-control form-control-user" type="number" id="exampleInputPassword-1" name="factureId" placeholder="Facture ID">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label">Join a file if necessary</label>-->
<!--                                            <input id="exampleInputPassword" class="form-control form-control-user" type="file" name="file" placeholder="This month record " />-->
<!--                                        </div>-->
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1" required>
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">You accept that any attempt at fraud will lead to legal action against you.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Confirmer</button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('reclamationType').addEventListener('change', function() {
            if (this.value === 'Autre') {
                document.getElementById('otherType').style.display = 'block';
            } else {
                document.getElementById('otherType').style.display = 'none';
            }
            if (this.value === 'Facture') {
                document.getElementById('factureId').style.display = 'block';
            } else {
                document.getElementById('factureId').style.display = 'none';
            }
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>