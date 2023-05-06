<?php

use App\XmlFormat\Controller\HandleXmlFile;

require_once __DIR__ . '/HandleXmlFile.php';

class HandleXmlData
{
    public function getData()
    {
        $xml = new HandleXmlFile();
        return $xml->getXmlData();
    }
}
