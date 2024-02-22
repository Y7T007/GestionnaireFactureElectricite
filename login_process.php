<?php

use Classes\Compteur;

require_once 'vendor/autoload.php';
session_start();


$compteurID = $_POST['compteurID'];
$dateNaissance = $_POST['dateNaissance'];

$compteur = new Compteur($compteurID, null, null, $dateNaissance,null);

if ($compteur->login($compteurID, $dateNaissance)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['compteurID'] = $compteurID;
    header('Location: index.php');
    exit;
} else {
    // login failed
    $_SESSION['login_error'] = "Incorrect Compteur ID or Date of Birth.";
    header('Location: login.php');
    exit;
}