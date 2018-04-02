<?php
include '../../database/databaseController.php';
include '../../classes/attemptClass.php';
include '../../classes/resultClass.php';


if(isset($_GET["userName"]) && isset($_GET["caseID"])){
	$userName = $_GET["userName"];
	$caseID = $_GET["caseID"];
	$newAttempt = [];
	for ($i = 0; ;$i++)
	{
		if(isset($_GET["isSelect".$i]) && isset($_GET["optionID".$i])){
			$dbController = new DatabaseController();
			
			$attemptOption = new AttemptClass(
					$_GET["optionID".$i], 
					$_GET["isSelect".$i]);
			
			array_push($newAttempt, $attemptOption);
		}
		else{
			break;
		}
	}
	$dbController = new DatabaseController();
	$result = $dbController->insertNewAttempt($userName, $caseID, $newAttempt);
	echo BLResult::BLResults($result);
}
else {
	echo BLResult::$MissingParameter;
}
?>