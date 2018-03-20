<?php
include '../../database/databaseController.php';
include '../../classes/attemptClass.php';


if(isset($_GET["userName"])){
	$userName = $_GET["userName"];
	
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
	$result = $dbController->insertNewAttempt($userName, $newAttempt);
	echo '{"result":'.$result.'}';
}
else {
	echo '{"result":0}';
}





?>