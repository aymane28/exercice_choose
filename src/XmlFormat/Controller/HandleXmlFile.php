<?php

namespace App\XmlFormat\Controller;

include_once(__DIR__ . '/../../config.php');

class HandleXmlFile
{
    public function getXmlData()
    {
        return simplexml_load_file(RESSOURCES_DIR . "regionsjob.xml");
    }
}
