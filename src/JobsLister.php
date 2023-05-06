<?php

namespace App;

use App\DbController\Model\DatabaseConnexion;

require_once __DIR__ . '/DbController/Model/DatabaseConnexion.php';

class JobsLister
{
    public function listJobs(): array
    {
        $db = new DatabaseConnexion();
        $query = 'SELECT id, reference, title, description, url, company_name, publication FROM job';
        return $db->executeQuery($query);
    }
}
