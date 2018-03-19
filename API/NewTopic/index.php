<?php
include '../../database/databaseController.php';

$topic = $_GET["topic"];
$content = $_GET["content"];
$userName = $_GET["userName"];


$dbController = new DatabaseController();
$result = $dbController->insertNewTopic($topic, $content, $userName);
echo '{"result":'.$result.'}';

?>