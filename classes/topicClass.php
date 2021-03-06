<?php
class TopicClass{
	public $topicID;
	public $topicTitle;
	public $topicContent;
	public $topicOwnerUserID;
	public $topicOwnerUserDisplayName;
	public $topicDateTime;
	public $topicReplies;
	public $topicNumberOfReplies;
	public $topicNumberOfLikes;
	public $topicNumberOfDislikes;
	
	public function __construct(
			$topicID,
			$topicTitle, 
			$topicContent,
			$topicOwnerUserID,
			$topicOwnerUserDisplayName,
			$topicDateTime,
			$topicNumberOfReplies,
			$topicNumberOfLikes,
			$topicNumberOfDislikes){
		$this->topicID = $topicID;
		$this->topicTitle = $topicTitle;
		$this->topicContent = $topicContent;
		$this->topicOwnerUserID = $topicOwnerUserID;
		$this->topicOwnerUserDisplayName = $topicOwnerUserDisplayName;
		$this->topicDateTime = $topicDateTime;
		$this->topicNumberOfReplies = $topicNumberOfReplies;
		$this->topicNumberOfLikes = $topicNumberOfLikes;
		$this->topicNumberOfDislikes = $topicNumberOfDislikes;
	}
	
	public function setReplies($topicREplies){
		$this->topicReplies = $topicREplies;
	}
}


class TopicFirstFloorClass{
	public $topicID;
	public $topicTitle;
	public $topicContent;
	public $topicOwnerUserID;
	public $topicOwnerUserDisplayName;
	public $topicOwnerUserAvatar;
	public $topicDateTime;
	public $topicNumberOfReplies;
	public $topicNumberOfLikes;
	public $topicNumberOfDislikes;

	public function __construct(
			$topicID,
			$topicTitle,
			$topicContent,
			$topicOwnerUserID,
			$topicOwnerUserDisplayName,
			$topicOwnerUserAvatar,
			$topicDateTime,
			$topicNumberOfReplies,
			$topicNumberOfLikes,
			$topicNumberOfDislikes){
				$this->topicID = $topicID;
				$this->topicTitle = $topicTitle;
				$this->topicContent = $topicContent;
				$this->topicOwnerUserID = $topicOwnerUserID;
				$this->topicOwnerUserDisplayName = $topicOwnerUserDisplayName;
				$this->topicOwnerUserAvatar = $topicOwnerUserAvatar;
				$this->topicDateTime = $topicDateTime;
				$this->topicNumberOfReplies = $topicNumberOfReplies;
				$this->topicNumberOfLikes = $topicNumberOfLikes;
				$this->topicNumberOfDislikes = $topicNumberOfDislikes;
	}
}

class ReplyClass{
	public $replyID;
	public $replyContent;
	public $replyUserID;
	public $replyUserDisplayName;
	public $replyDateTime;
	public $replyUserAvatar;
	
	public function __construct(
			$topicReplyID,
			$userID,
			$userDisplayName,
			$userAvatar,
			$replyContent,
			$replyTime){
		$this->replyID = $topicReplyID;
		$this->replyContent = $replyContent;
		$this->replyUserID = $userID;
		$this->replyUserDisplayName = $userDisplayName;
		$this->replyDateTime = $replyTime;
		$this->replyUserAvatar = $userAvatar;
	}
}
?>