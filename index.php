<?php

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

// Define your routes


$router->get('/login', function() {
    $message = require 'auth/login.php';
    echo $message;
});

$router->get('/route2', function() {
    require 'actions/file2.php';
    // Call the function or method in file2.php
    action2();
});



$router->run();