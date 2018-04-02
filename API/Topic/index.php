<?php
// Topic

include '../../database/databaseController.php';
include '../../classes/topicClass.php';


if (isset($_GET["topicID"])) {
	
	$topicID = $_GET["topicID"];
	$dbController = new DatabaseController();
	
	if (isset($_GET["t"])) {
		$t = $_GET["t"];
		if ($t=="firstFloor") {
			$result = $dbController->selectFirstFloorTopic($topicID);
			if($result == false){
				echo BLResult::$SelectDatabaseFails;
				// 			echo '{\'result\':0}';
			}
			else
			{
				// 	topicReplyID, userID, userDisplayName, userAvatar, replyContent, replyTime
				$row = mysqli_fetch_array($result);
				$topicID = $row[0];
				$topicTitle = $row[1];
				$topicContent = $row[2];
				$topicOwnerUserID = $row[3];
				$topicOwnerUserDisplayName = $row[4];
				$topicOwnerUserAvatar = $row[5];
				$topicDateTime = $row[6];
				$topicNumberOfReplies = $row[7];
				$topicNumberOfLikes = $row[8];
				$topicNumberOfDislikes = $row[9];
				
				$topicFirstFloor = new TopicFirstFloorClass(
						$topicID,
						$topicTitle,
						$topicContent,
						$topicOwnerUserID,
						$topicOwnerUserDisplayName,
						$topicOwnerUserAvatar,
						$topicDateTime,
						$topicNumberOfReplies,
						$topicNumberOfLikes,
						$topicNumberOfDislikes);
			
				echo json_encode($topicFirstFloor);
			
			}
		}
	}
	else {
		
		$result = $dbController->selectTopicRepliesByTopicID($topicID);
		
		if($result == false){
			echo BLResult::$SelectDatabaseFails;
// 			echo '{\'result\':0}';
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
	}
}


?>