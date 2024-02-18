<?php

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

// Define your routes
$router->get('/route1', function() {
    require 'actions/file1.php';
    // Call the function or method in file1.php
    action1();
});

$router->get('/route2', function() {
    require 'actions/file2.php';
    // Call the function or method in file2.php
    action2();
});

// ... add more routes as needed

// Run the router
$router->run();