<?php

use Classes\Fournisseur;

require_once 'vendor/autoload.php';
session_start();

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$Fournisseur = new Fournisseur(null, null, null, null, $Email, $Password);

if ($Fournisseur->login($Email, $Password)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['Email'] = $Email;
    header('Location: Admin_Clients.php');
    exit;
} else {
    // login failed
    $_SESSION['login_error'] = "Incorrect Email or Password.";
    header('Location: login_admin.php');
    exit;
}