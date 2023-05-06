<?php

/************************************
 * Entry point of the project.
 * To be run from the command line.
 ************************************/

use App\DbController\Model\DatabaseConnexion;
use App\JobsLister;
use App\JsonFormat\Controller\ManageJsonData;

include_once(__DIR__ . '/DbController/Model/DatabaseConnexion.php');
include_once(__DIR__ . '/JsonFormat/Controller/ManageJsonData.php');
include_once(__DIR__ . '/XmlFormat/Controller/ManageXmlData.php');
include_once(__DIR__ . '/Helper/MessageLogHelper.php');
include_once(__DIR__ . '/JobsLister.php');
include_once(__DIR__ . '/config.php');

$messageLog = new MessageLogHelper();

$messageLog->printMessage("Starting...");

$db = new DatabaseConnexion();
$db->executeQuery('DELETE FROM job');

$jobsJson = new ManageJsonData($db);
$jobsJson->insertDataInDatabase();

$jobsXml = new ManageXmlData($db);
$jobsXml->insertDataInDatabase();

/* list jobs */
$jobsLister = new JobsLister();
$jobs = $jobsLister->listJobs();

$messageLog->printMessage("\n\n > all jobs ({count}):", ['{count}' => count($jobs)]);

foreach ($jobs as $job) {
    $messageLog->printMessage(" {id}: {reference} - {title} - {publication}", [
        '{id}' => $job['id'],
        '{reference}' => $job['reference'],
        '{title}' => $job['title'],
        '{publication}' => $job['publication']
    ]);
}

$messageLog->printMessage("Terminating...\n");
