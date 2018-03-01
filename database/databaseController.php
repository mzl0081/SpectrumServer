<?php
class DatabaseController {
	public $connection;
	
	function __construct($serverAddress, $username, $password, $database) {
		$connection=mysql_connect($serverAddress, $username, $password);
		mysql_select_db($database, $connection);
	}
	
	function fetch($sql) {
		return mysql_query($sql);
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
}
?>