<?php
include '../../database/databaseController.php';

$topicID = $_GET["topicID"];

$dbController = new DatabaseController();
$dbController->topics();

?>