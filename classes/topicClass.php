<?php
class TopicClass{
	public $topicTitle;
	public $topicContent;
	public $topicOwnerUserID;
	public $topicDateTime;
	public $topicReplies;
	
	public function __construct(
			$topicTitle, 
			$topicContent,
			$topicOwnerUserID,
			$topicOwnerUserDisplayName,
			$topicDateTime,
			$topicReplies){
		$this->topicTitle = $topicTitle;
		$this->topicContent = $topicContent;
		$this->topicOwnerUserID = $topicOwnerUserID;
		$this->topicDateTime = $topicDateTime;
		$this->topicReplies = $topicReplies;
	}
}

class ReplyClass{
	public $replyContent;
	public $replyUserID;
	public $replyUserDisplayName;
	public $replyDateTime;
	
	public function __construct(
			$replyContent,
			$replyUserID,
			$replyUserDisplayName,
			$replyDateTime){
		$this->replyContent;
		$this->replyUserID;
		$this->replyUserDisplayName;
		$this->replyDateTime;
	}
}
?>