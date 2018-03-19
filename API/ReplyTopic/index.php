<?php
// ReplyTopic
include '../../database/databaseController.php';

$topicID = $_GET["topicID"];
$content = $_GET["content"];
$userName = $_GET["userName"];


$dbController = new DatabaseController();
$result = $dbController->insertNewTopicReply($topicID, $content, $userName);
echo '{"result":'.$result.'}';

?>