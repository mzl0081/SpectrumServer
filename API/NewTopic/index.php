<?php
include '../../database/databaseController.php';
include '../../classes/resultClass.php';

if (isset($_GET["topic"]) && isset($_GET["content"]) && isset($_GET["userName"])) {
	$topic = $_GET["topic"];
	$content = $_GET["content"];
	$userName = $_GET["userName"];
	
	$dbController = new DatabaseController();
	$result = $dbController->insertNewTopic($topic, $content, $userName);
	echo '{"result":'.$result.'}';
}
else{
	echo BLError::$MissingParameter;
}

?>