<!-- Get cases by userID -->
<?php
include '../database/databaseController.php';
include '../classes/caseClass.php';

$userID=$_POST["userID"];

$dbController = new DatabaseController();

$resultCase = $dbController->fetchCasesByUserID($userID);

while ($row = mysql_fetch_array($resultCase)) {
	$caseID = $row[0];
	$caseName = $row[1];
	$caseDescription = $row[2];
	$caseVideoName = $row[3];
	$caseType = $row[4];
	$caseCoverPic = $row[5];
	$caseVideoScreenshot = $row[6];
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