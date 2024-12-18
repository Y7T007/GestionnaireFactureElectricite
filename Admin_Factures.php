<?php
require_once 'vendor/autoload.php';
require_once 'Classes/Facture.php';
require_once 'Classes/Clients.php'; // Include the Clients class
use Classes\Facture;
use Classes\Clients; // Use the Clients class

// Create a new Facture object
$facture = new Facture(null, null, null, null, null, null, null, null, null);

// Get all the factures
$factures = $facture->getAllFactures();

// Create a new Clients object
$Clients = new Clients(null, null, null, null, null);

// Rest of the PHP code...
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>


<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Y7T007</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link active" href="Admin_Factures.html"><i class="fas fa-table"></i><span>Factures</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="Admin_Reclamations.php"><i class="far fa-comment-alt"></i><span>Reclamations</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="Admin_Clients.php"><i class="fas fa-user-circle"></i><span>Clients</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Factures</h3>
                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="Admin_create_monthly_factures.php" style="text-align: right;">
                        <i class="fas fa-plus fa-sm text-white-50" style="font-size: 13px;">

                        </i>&nbsp;Month Facturation init</a>
                    <button type="button" class="btn btn-primary btn-sm d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#yearlyFacturationModal">
                        <i class="fas fa-plus fa-sm text-white-50" style="font-size: 13px;"></i>&nbsp;Yearly Facturation
                    </button>

                    <!-- Add this button next to the "Add Yearly Consumption" button -->
                    <button type="button" class="btn btn-primary btn-sm d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#viewYearlyConsumptionModal">
                        <i class="fas fa-eye fa-sm text-white-50" style="font-size: 13px;"></i>&nbsp;View Yearly Consumption
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="viewYearlyConsumptionModal" tabindex="-1" aria-labelledby="viewYearlyConsumptionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewYearlyConsumptionModalLabel">Yearly Consumption</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table id="yearlyConsumptionTable" class="table">
                                        <thead>
                                        <tr>
                                            <th>Clients ID</th>
                                            <th>Year</th>
                                            <th>Consumption</th>
                                            <th>Sum of Factures </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Fetch the data from the database
                                        $annualConsumptions = \Classes\Annual_Consumption::getAllAnnualConsumptions();

                                        // Loop through the data and create a table row for each record
                                        foreach ($annualConsumptions as $consumption) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($consumption['ClientsID']) . "</td>";
                                            echo "<td>" . htmlspecialchars($consumption['Year']) . "</td>";
                                            echo "<td>" . htmlspecialchars($consumption['Consumption']) . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Check if the session variable is set -->
                    <?php if (isset($_SESSION['violating_clients'])): ?>

                        <button type="button" class="btn btn-danger btn-sm d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#violatingClientsModal">
                            <i class="fas fa-plus fa-sm text-white-50" style="font-size: 13px;"></i>&nbsp;View Violating Clients
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="violatingClientsModal" tabindex="-1" aria-labelledby="violatingClientsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="violatingClientsModalLabel">Violating Clients</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Loop through the violating clients and display their data -->
                                        <?php foreach ($_SESSION['violating_clients'] as $client): ?>
                                            <p style="color: red;">ID_Clients: <?php echo $client[0]; ?>, CONSUMPTION: <?php echo $client[1]; ?>, YEAR: <?php echo $client[2]; ?>, CREATIONDATE: <?php echo $client[3]; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Factures Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Facture ID</th>
                                        <th>Clients ID</th>
                                        <th>Date Facture</th>
                                        <th>Consomation</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($factures as $facture): ?>
                                        <tr>
                                            <td><?php echo $facture['FactureID']; ?></td>
                                            <td><?php echo $facture['ClientsID']; ?></td>
                                            <td><?php echo $facture['DateFacture']; ?></td>
                                            <td><?php echo $facture['Consomation']; ?></td>
                                            <td>
                                                <?php
                                                if ($facture['Statut'] == 'NV') {
                                                    echo '<button type="button" class="btn btn-primary" disabled>NV</button>';
                                                } elseif ($facture['Statut'] == 'Confirmed') {
                                                    echo '<button type="button" class="btn btn-success" disabled>Confirmed</button>';
                                                } elseif ($facture['Statut'] == 'Refused') {
                                                    echo '<button type="button" class="btn btn-warning" disabled>Refused</button>';
                                                }  elseif ($facture['Statut'] == 'paid') {
                                                    echo '<button type="button" class="btn btn-success" disabled>Paid</button>';
                                                } else{
                                                    echo '<button type="button" class="btn btn-dark" disabled>'.$facture['Statut'].'</button>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#factureModal<?php echo $facture['FactureID']; ?>">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>



                                <?php foreach ($factures as $facture): ?>
                                    <?php
                                    // Get the Clients data for the current Facture
                                    $ClientsData = $Clients->getClients($facture['ClientsID']);
                                    ?>
                                    <div class="modal fade" id="factureModal<?php echo $facture['FactureID']; ?>" tabindex="-1" aria-labelledby="factureModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="factureModalLabel">Facture Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <br> Facture ID:<div class="editable" id="factureID<?php echo $facture['FactureID']; ?>"><?php echo $facture['FactureID']; ?></div>
                                                    <br> Clients ID:<div class="editable" id="clientsID<?php echo $facture['FactureID']; ?>"><?php echo $facture['ClientsID']; ?></div>
                                                    <br> Client Name:<div class="editable" id="clientName<?php echo $facture['FactureID']; ?>"><?php echo $ClientsData['ClientName']; ?></div>
                                                    <br> Address: <div class="editable" id="address<?php echo $facture['FactureID']; ?>"><?php echo $ClientsData['Address']; ?></div>
                                                    <br> Last counting number :<div class="editable" id="lastCountingNumber<?php echo $facture['FactureID']; ?>"> <?php echo $ClientsData['ElectricalDashNumber']; ?></div>
                                                    <br> Consomation :<div class="editable" id="consomation<?php echo $facture['FactureID']; ?>"><?php echo $facture['Consomation']; ?></div>
                                                    <br> Date Facture:<div class="editable" id="dateFacture<?php echo $facture['FactureID']; ?>"> <?php echo $facture['DateFacture']; ?></div>
                                                    <br> Status: <div class="editable" id="status<?php echo $facture['FactureID']; ?>"><?php echo $facture['Statut']; ?></div>
                                                    <div class="container">
                                                        <a href="<?php echo $facture['Image']; ?>" data-lightbox="factureImage">
                                                            <img src="<?php echo $facture['Image']; ?>" style="width: 100%;border-radius: 15px" alt="Facture Image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" onclick="updateFactureStatus(<?php echo $facture['FactureID']; ?>, 'Confirmed')">Confirm</button>
                                                    <button type="button" class="btn btn-danger" onclick="updateFactureStatus(<?php echo $facture['FactureID']; ?>, 'Refused')">Refuse</button>
                                                    <button type="button" class="btn btn-primary" id="editButton<?php echo $facture['FactureID']; ?>" onclick="editFacture(<?php echo $facture['FactureID']; ?>)">Edit</button>
                                                </div>
                                                <!-- Hidden form -->
                                                <form id="hiddenForm<?php echo $facture['FactureID']; ?>" method="POST" action="Admin_update_facture.php" style="display: none;">
                                                    <input type="hidden" name="factureID" value="<?php echo $facture['FactureID']; ?>">
                                                    <input type="hidden" name="clientsID">
                                                    <input type="hidden" name="clientName">
                                                    <input type="hidden" name="address">
                                                    <input type="hidden" name="lastCountingNumber">
                                                    <input type="hidden" name="consomation">
                                                    <input type="hidden" name="dateFacture">
                                                    <input type="hidden" name="status">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
        <script>
            function editFacture(factureID) {
                var editButton = document.getElementById('editButton' + factureID);
                var editableElements = document.querySelectorAll('.editable');

                if (editButton.innerHTML === 'Edit') {
                    editableElements.forEach(function(element) {
                        var text = element.innerHTML;
                        var id = element.id;
                        var inputType = 'text';
                        if (id.includes('consomation')) {
                            inputType = 'number';
                        } else if (id.includes('dateFacture')) {
                            inputType = 'date';
                        }
                        element.innerHTML = '<input type="' + inputType + '" id="' + id + 'Input" value="' + text + '">';
                    });
                    editButton.innerHTML = 'Save';
                } else {
                    var data = {};
                    editableElements.forEach(function(element) {
                        var id = element.id.replace(factureID, '');
                        var input = document.getElementById(element.id + 'Input');
                        element.innerHTML = input.value;
                        data[id] = input.value;
                    });
                    editButton.innerHTML = 'Edit';

                    // Send an AJAX request to update the facture in the database
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'Admin_update_facture.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            alert("Facture updated successfully.");
                            location.reload(); // Reload the page to see the updated status
                        }
                    }
                    xhr.send('factureID=' + factureID + '&data=' + JSON.stringify(data));
                }
            }

            function updateFactureStatus(factureID, status) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "Admin_update_facture.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        alert("Facture status updated successfully.");
                        location.reload(); // Reload the page to see the updated status
                    }
                }
                xhr.send("factureID=" + factureID + "&status=" + status);

                // Send an AJAX request to update the facture in the database
                xhr.open('POST', 'Admin_update_facture.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify({factureID: factureID, data: this.data}));
            }
        </script>
        <!-- Modal -->
        <div class="modal fade" id="yearlyFacturationModal" tabindex="-1" aria-labelledby="yearlyFacturationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="yearlyFacturationModalLabel">Yearly Facturation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Admin_yearly_facturation.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Text File</label>
                                <input class="form-control" type="file" id="file" name="file" accept=".txt">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- New table to display the imported data -->
                        <table id="importedDataTable" class="table" style="display: none;">
                            <thead>
                            <tr>
                                <th>Clients ID</th>
                                <th>Year</th>
                                <th>Consumption</th>
                                <th>Date Creation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Rows will be added here dynamically -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>