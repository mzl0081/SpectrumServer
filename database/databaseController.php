<?php
class DatabaseController {
	public $connection;
	
	function __construct($serverAddress, $username, $password, $database) {
		$this->connection=mysqli_connect($serverAddress, $username, $password, $database);
// 		mysql_select_db($database, $this->connection);
	}
	
	function fetch($sql) {
		return mysqli_query($this->connection, $sql);
	}
	
	function insertUser($username, $userPassword, $userEmail) {
		
		$sql = "insert into spectrum_users values(null, '$username', '$userPassword','$userEmail', '$username', null);";
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