<?php
namespace Classes;

class Fournisseur {
    private $FournisseurID;
    private $FournisseurName;
    private $Address;
    private $Phone;
    private $Email;
    private $Password;
    private $db;

    public function __construct($FournisseurID, $FournisseurName, $Address, $Phone, $Email, $Password) {
        $this->FournisseurID = $FournisseurID;
        $this->FournisseurName = $FournisseurName;
        $this->Address = $Address;
        $this->Phone = $Phone;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->db = new DB_Connection();
    }

    public function login($Email, $Password) {
        // Prepare and execute the SQL statement
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM Fournisseur WHERE Email = ?");
        $stmt->execute([$Email]);

        // Fetch the result
        $result = $stmt->fetch();

        // Verify the password
        if ($result && password_verify($Password, $result['Password'])) {
            return true;
        } else {
            return false;
        }
    }
}