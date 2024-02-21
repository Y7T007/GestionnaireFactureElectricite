<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

use Classes\DB_Connection;
use Classes\Reclamation;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

if (file_exists(__DIR__.'/.env') && is_readable(__DIR__.'/.env')) {
    $dotenv->load();
} else {
    die('Could not load .env file');
}

$CONN_STRING = $_ENV['JAWSDB_URL'] ;

$db = new DB_connection($CONN_STRING);

$reclamation = new Reclamation(2, 5, "hwllo", "2025-02-02", "workd", "en attente", "2022-01-01");

//$reclamation->addReclamation();
$tables = $reclamation->getAllReclamations();

foreach ($tables as $table) {
    echo $table['Type_reclamation'] . '<br>';
}

?>
<a href="/client/index.php"></a>
<a href="/provider/index.php"></a>

<?php
//
//
//use Classes\DB_Actions;
//use Classes\Reclamation;
//
//require_once __DIR__ . '/Classes/DB_actions.php';
//require_once __DIR__ . '/Classes/Reclamation.php';
//
//$reclamation = new  Reclamation(123, 123, "type", "date", "content", "statut", "dateCreation");
//$DB_actions = new DB_Actions();
//
//$DB_actions->DBaddReclamation($reclamation);
//?>



</body>
</html>