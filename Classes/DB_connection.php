<?php

namespace Classes;

use Dotenv\Dotenv;
use PDO;
use PDOException;
require '../vendor/autoload.php';


class DB_Connection
{
    private $pdo;

    public function __construct()
    { 

        $dotenv = Dotenv::createImmutable(__DIR__);

        if (file_exists(__DIR__.'/.env') && is_readable(__DIR__.'/.env')) {
            $dotenv->load();
        } else {
            die('Could not load .env file');
        }

        $connectionString = $_ENV['JAWSDB_URL'] ;

        $url = parse_url($connectionString);

        $dsn = "mysql:host={$url['host']};port={$url['port']};dbname=" . substr($url['path'], 1);

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $url['user'], $url['pass'], $options);
        } catch (PDOException $e) {
            // Handle the exception appropriately (log, show error page, etc.)
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function getTables()
    {
        try {
            $stmt = $this->pdo->query('SHOW TABLES');
            return $stmt->fetchAll(PDO::FETCH_NUM);
        } catch (PDOException $e) {
            // Handle the exception appropriately (log, show error page, etc.)
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
