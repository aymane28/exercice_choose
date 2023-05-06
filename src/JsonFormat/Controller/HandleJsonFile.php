<?php

namespace App\JsonFormat\Controller;

include_once(__DIR__ . '/../../config.php');

class HandleJsonFile
{
    /**
     * @return false|string
     */
    public function getJsonData()
    {
        return file_get_contents(RESSOURCES_DIR . "jobteaser.json");
    }
}