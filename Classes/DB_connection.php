<?php

namespace Classes;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;
use MongoDB\Driver\Exception\Exception;

class DB_connection
{
    private $uri;
    private $client;

    public function __construct()
    {
        $this->uri = 'mongodb+srv://yassir7t:C3mN2e9R6jL%25bsX@users.lhhhvmb.mongodb.net/?retryWrites=true&w=majority';
        $apiVersion = new ServerApi(ServerApi::V1);
        $this->client = new Client($this->uri, [], ['serverApi' => $apiVersion]);
    }

    public function getClient()
    {
        try {
            // Send a ping to confirm a successful connection
            $this->client->selectDatabase('admin')->command(['ping' => 1]);
            echo "Pinged your deployment. You successfully connected to MongoDB!\n";
            return $this->client;
        } catch (Exception $e) {
            printf($e->getMessage());
            return null;
        }
    }
}