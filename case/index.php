<!-- Get cases by userID -->
<?php
include '../databaseController.php';
include '../classes/caseClass.php';

$userID=$_POST["userID"];

$serverAddress = 'acadmysql.duc.auburn.edu';
$username = 'bzl0048';
$password = 'boningliang';
$database = 'bzl0048db';

$dbController = new DatabaseController(
		$serverAddress, 
		$username, 
		$password, 
		$database);

$resultCase = $dbController->fetchCasesByUserID($userID);

while ($row = mysql_fetch_array($resultCase)) {
	$caseID = $row[0];
	$caseName = $row[1];
	$caseDescription = $row[2];
	$caseVideoName = $row[3];
	$caseType = $row[4];
	$caseCoverPic = $row[5];
	$caseVideoScreenshot = $row[6];
// 	$resultQuestion = $dbController->
// 	$teachersNotes,
// 	$questions
	$case = new CaseClass(
			$caseID, 
			$caseName, 
			$caseDescription, 
			$caseVideoName, 
			$caseType, 
			$caseCoverPic, 
			$caseVideoScreenshot, 
			$teachersNotes, 
			$questions);
}

?>