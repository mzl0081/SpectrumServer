<?php
// ReplyTopic
include '../../database/databaseController.php';

$topicID = $_GET["topicID"];
$content = $_GET["content"];
$userID = $_GET["userID"];

$dbController = new DatabaseController();
$result = $dbController->insertNewTopicReply($topic, $content, $userID);
echo '{"result":'.$result.'}';

?>