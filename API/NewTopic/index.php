<?php
include '../../database/databaseController.php';

$topic = $_GET["topic"];
$content = $_GET["content"];
$userID = $_GET["userID"];

$dbController = new DatabaseController();
$result = $dbController->insertNewTopic($topic, $content, $userID);
echo '{"result":'.$result.'}';

?>