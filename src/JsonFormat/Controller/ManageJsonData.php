<?php

namespace App\JsonFormat\Controller;

use App\DbController\Model\DatabaseConnexion;

require_once __DIR__ . '/HandleJsonData.php';
require_once __DIR__ . '/../../DbController/Model/DatabaseConnexion.php';

class ManageJsonData
{
    private DatabaseConnexion $databaseConnexion;

    public function __construct(DatabaseConnexion $databaseConnexion)
    {
        $this->databaseConnexion = $databaseConnexion;
    }

    /**
     * @return void
     * Insert data into database
     */
    public function insertDataInDatabase(): void
    {
        $jsonData = new HandleJsonData();
        foreach ($jsonData->getData()['offers'] as $offers) {
            echo $offers['title'];
            $timestamp = strtotime($offers['publishedDate']);
            $mysqlDate = date('Y-m-d H:i:s', $timestamp);
            $query = 'INSERT INTO job(reference, title, description, url, company_name, publication) VALUES('
                . '\'' . addslashes($offers['reference']) . '\',
                ' . '\'' . addslashes($offers['title']) . '\',
                ' . '\'' . addslashes($offers['description']) . '\',
                ' . '\'' . addslashes($offers['urlPath']) . '\',
                ' . '\'' . addslashes($offers['companyname']) . '\',
                ' . '\'' . addslashes($mysqlDate) . '\')';
            $this->databaseConnexion->executeQuery($query);
        }
    }
}


