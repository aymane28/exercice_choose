<?php

use App\DbController\Model\DatabaseConnexion;

require_once __DIR__ . '/HandleXmlData.php';
require_once __DIR__ . '/../../DbController/Model/DatabaseConnexion.php';

class ManageXmlData
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
        $xmlData = new HandleXmlData();
        foreach ($xmlData->getData()->item as $item) {
            $query = 'INSERT INTO job (reference, title, description, url, company_name, publication) VALUES ('
                . '\'' . addslashes($item->ref) . '\', '
                . '\'' . addslashes($item->title) . '\', '
                . '\'' . addslashes($item->description) . '\', '
                . '\'' . addslashes($item->url) . '\', '
                . '\'' . addslashes($item->company) . '\', '
                . '\'' . addslashes($item->pubDate) . '\')';
            $this->databaseConnexion->executeQuery($query);
        }
    }
}
