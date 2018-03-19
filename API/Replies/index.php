<?php
// Topic
// error code 101: topicID not found
// error code 102: topic deleted

include '../../database/databaseController.php';
include '../../classes/topicClass.php';

$topicID = $_GET["topicID"];

$dbController = new DatabaseController();
$result = $dbController->selectTopicRepliesByTopicID($topicID);

if($result == false){
	echo '{\'result\':0}';
}
else{
	$replies = [];
	while($row = mysqli_fetch_array($result)){
		$replyID = $row[0];
		$replyUserID = $row[1];
		$replyUserDisplayName = $row[2];
		$replyContent = $row[3];
		$replyDateTime = $row[4];

		$reply = new ReplyClass(
				$replyID,
				$replyContent,
				$replyUserID,
				$replyUserDisplayName,
				$replyDateTime);
		array_push($replies, $reply);
	}
	echo json_encode($replies);
}

?>