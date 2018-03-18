<?php
// Topic
// error code 101: topicID not found
// error code 102: topic deleted

include '../../database/databaseController.php';

$topicID = $_GET["topicID"];

$dbController = new DatabaseController();
$dbController->topics();

?>