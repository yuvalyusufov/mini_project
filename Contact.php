<?php
require 'ConnectDb.php';

class Contact {
    
    private $data;

    public $errors = [];

    public function __construct($data = null) 
    {
        if ($data) {
            $this->data = $data;
        }
    }

    public function save() 
    {
        $pdo = ConnectDb::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO contacts (first_name, last_name, phone, id)
        VALUES (:first_name, :last_name, :phone, :id);");
        $stmt->execute($this->data); // or [''=>'']
    }


    public static function getContact($contactId) 
    {
        $db = ConnectDb::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM contacts WHERE contact_id = :contact_id");
        $stmt->execute([':contact_id' => $contactId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getContacts()
    {
        $pdo = ConnectDb::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM contacts");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function validate()
    {
        if (
            $data['firstName']
        ) {


            return true;
        }

        return false;
    }
}



?>