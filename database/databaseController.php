<?php
class DatabaseController {
	public $connection;
// 	private $serverAddress = 'acadmysql.duc.auburn.edu';
// 	private $dbUsername = 'bzl0048';
// 	private $dbPassword = 'boningliang';
// 	private $database = 'bzl0048db';

	private $serverAddress = '127.0.0.1';
	private $dbUsername = 'root';
	private $dbPassword = '';
	private $database = 'spectrum';
	
	
	function __construct() {
		$this->connection=mysqli_connect($this->serverAddress, $this->dbUsername, $this->dbPassword, $this->database);
	}
	
	function fetch($sql) {
		return mysqli_query($this->connection, $sql);
	}
	
	function insertUser($username, $userPassword, $userEmail) {
		
		$sql = "insert into spectrum_users values(null, '$username', '$userPassword','$userEmail', '$username', null);";
		return mysqli_query($this->connection, $sql);
	}
	
	function insertNewTopic($topic, $content, $userName){
		// 
		$sql = "insert into spectrum_topics values(null, '$topic', '$content',(select userID from spectrum_users where userAccount='$userName'), null , 0, 0, 0);";
// 		echo $sql;
		return mysqli_query($this->connection, $sql);
	}
	
	function insertNewTopicReply($topicID, $content, $userName){
		$sql = "insert into spectrum_topic_reply values(null, '$topicID',(select userID from spectrum_users where userAccount='$userName'), '$content', null);";
		return mysqli_query($this->connection, $sql);
	}
	
	function resetPassword($email, $newPassword){
		$sql = "update spectrum_users set userPassword = '$newPassword' where userEmail = '$email';";
		return mysqli_query($this->connection, $sql);
	}
	
	function login($username, $password){
		$sql = "select * from spectrum_users where userAccount='$username' and userPassword='$password';";
		return mysqli_query($this->connection, $sql);
	}
	
	function userProfile($username, $password){
		$sql = "select userAccount, userEmail, userDisplayName, userAvatar from spectrum_users where userAccount='$username' and userPassword='$password';";
		return mysqli_query($this->connection, $sql);
	}
	
	function topics(){
		$sql = "select topicID, topicTitle, topicContent, userID, userDisplayName, topicTime, topicNumberOfReplies, numberOfLikes, numberOfDislikes from spectrum_topics join spectrum_users using(userID) order by(topicTime) desc;";
		return mysqli_query($this->connection, $sql);
	}
		
	function topicByID($topicID){
		$sql = "select topicID, topicTitle, topicContent, userID, userDisplayName, topicTime, topicNumberOfReplies, numberOfLikes, numberOfDislikes from spectrum_topics join spectrum_users using(userID) where topicID='$topicID';";
		return mysqli_query($this->connection, $sql);
	}
		
	function selectTopicRepliesByTopicID($topicID){
		$sql = "select topicReplyID, userID, userDisplayName, userAvatar, replyContent, replyTime from spectrum_topic_reply join spectrum_users using(userID) where topicID = '$topicID' order by(replyTime) desc;";
		return mysqli_query($this->connection, $sql);
	}
	
	function fetchAllUsers() {
		
	}
	
	function fetchAllCases() {
		
	}
	
	function fetchCasesByUserID ($userID) {
		$sql = "select *
				from spectrum_case
				join (select distinct caseID 
						from spectrum_case_user_relationship 
						join sepctrum_users using($userID) 
						where userID = '1') as T1 using(caseID);";
	}
	
	function fetchUsername($username){
		$sql = "select * from spectrum_users where userAccount = '$username'";
		return mysqli_query($this->connection, $sql);
	}
}
?>