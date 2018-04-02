<?php
// AllTopics


include '../../database/databaseController.php';
include '../../classes/topicClass.php';

$dbController = new DatabaseController();
$result = $dbController->topics();

if($result == false){
	echo '{\'result\':0}';
}
else{
	$topics = [];
	while ($row = mysqli_fetch_array($result)){
		$topicID = $row[0];
		$topicTitle = $row[1];
		$topicContent = $row[2];
		$topicOwnerUserID = $row[3];
		$topicOwnerUserDisplayName = $row[4];
		$topicDateTime = $row[5];
		$topicNumberOfReplies = $row[6];
		$topicNumberOfLikes = $row[7];
		$topicNumberOfDislikes = $row[8];
		
		$topic = new TopicClass(
				$topicID, 
				$topicTitle, 
				$topicContent, 
				$topicOwnerUserID, 
				$topicOwnerUserDisplayName, 
				$topicDateTime, 
				$topicNumberOfReplies, 
				$topicNumberOfLikes, 
				$topicNumberOfDislikes);
		array_push($topics, $topic);
	}
	echo json_encode($topics);
}

?>