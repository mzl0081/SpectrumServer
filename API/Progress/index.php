<?php
include '../../database/databaseController.php';

class progressClass {
	public $totalNumberOfCases;
	public $finishedNumberOfCase;
	public $percentage;
	function __construct(
			$totalNumberOfCases,
			$finishedNumberOfCase,
			$percentage) {
		$this->totalNumberOfCases = $totalNumberOfCases;
		$this->finishedNumberOfCase = $finishedNumberOfCase;
		$this->percentage = $percentage;
	}
}

if (isset($_GET["userName"])) {
	$userName = $_GET["userName"];
	$dbController = new DatabaseController();
	$result = $dbController->selectProgressByUserName($userName);
	
	if ($result == false) {
		echo BLResult::$SelectDatabaseFails;
	}
	else {
		$row = mysqli_fetch_array($result);
		$totalNumberOfCases = $row[2];
		$finishedNumberOfCase = $row[3];
		$percentage = $row[4];
		
		$progress = new progressClass($totalNumberOfCases, $finishedNumberOfCase, $percentage);
		header('Content-Type:application/json');
		echo json_encode($progress);	
	}
}


?>