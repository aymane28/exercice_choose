<?php

namespace App\DbController\Model;
use Exception;
use PDO;

include_once(__DIR__ . '/../../config.php');

class DatabaseConnexion
{
    private PDO $db;

    public function connectToDatabase()
    {
        /* connect to DB */
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DB, SQL_USER, SQL_PWD);
        } catch (Exception $e) {
            die('DB error: ' . $e->getMessage() . "\n");
        }
    }

    public function executeQuery($query)
    {
        if (!isset($this->db)) {
            $this->connectToDatabase();
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
