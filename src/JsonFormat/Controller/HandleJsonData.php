<?php

namespace App\JsonFormat\Controller;

require_once __DIR__ . '/HandleJsonFile.php';

class HandleJsonData
{
    /**
     * @return array
     */
    public function getData(): array
    {
        $jsonData = new HandleJsonFile();
        return json_decode($jsonData->getJsonData(), true);
    }
}
