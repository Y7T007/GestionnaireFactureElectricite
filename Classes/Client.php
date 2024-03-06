<?php

namespace Classes;

use Classes\DB_Connection;
require_once 'vendor/autoload.php';

class Client
{
    public $ClientName;
    public $Address;
    public $dateNaissance;

    public function __construct($ClientName, $Address, $dateNaissance)
    {
        $this->ClientName = $ClientName;
        $this->Address = $Address;
        $this->dateNaissance = $dateNaissance;
    }
}