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
// 	topicReplyID, userID, userDisplayName, userAvatar, replyContent, replyTime
	while($row = mysqli_fetch_array($result)){
		$topicReplyID = $row[0];	
		$userID = $row[1];
		$userDisplayName = $row[2];
		$userAvatar = $row[3];
		$replyContent = $row[4];
		$replyTime = $row[5];
		
		$reply = new ReplyClass(
				$topicReplyID,
				$userID, 
				$userDisplayName, 
				$userAvatar, 
				$replyContent,
				$replyTime);
		array_push($replies, $reply);
	}
	echo json_encode($replies);
}

?>