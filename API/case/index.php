<?php
include '../../database/databaseController.php';
include '../../classes/caseClass.php';

$userName=$_GET["userName"];

$dbController = new DatabaseController();

$resultCase = $dbController->fetchCasesByUserName($userName);

if ($resultCase == false)
{
	echo '{"error":"0"}';
}
else
{
	$cases = array();
	while ($row = mysqli_fetch_array($resultCase)) {
		$caseID = $row[0];
		$caseName = $row[1];
		$caseDescription = $row[2];
		$caseVideoName = $row[3];
		$caseType = $row[4];
		$caseCoverPic = $row[5];
		$caseVideoScreenshot = $row[6];
		$teachersNotes = array();
		
		$resultTeachersNote = $dbController->fetchTeachersNoteByCaseID($caseID);
		if($resultTeachersNote == false)
		{
			echo '{"error":"1"}';
		}
		else {
			while ($row1 = mysqli_fetch_array($resultTeachersNote)){
				$noteID = $row1[0];
				$noteVideo = $row1[1];
				$noteCover = $row1[2];
				$teachersNote = new TeachersNotesClass(
						$noteID,
						$noteVideo,
						$noteCover);
				array_push($teachersNotes, $teachersNote);
			}
			
			$questions = array();
			$resultQuestion = $dbController->fetchQuestionsByCaseID($caseID);
			if ($resultQuestion == false){
				echo '{"error":"2"}';
			}
			else{
				while ($row2 = mysqli_fetch_array($resultQuestion)){
					$questionID = $row2[0];
					$questionContent = $row2[1];
					$explanation = $row2[2];
					$options = array();
					
					$resultOption = $dbController->fetchOptionsByQuestionID($questionID);
					if ($resultOption == false){
						echo '{"error":"3"}';
					}
					else {
						while ($row3 = mysqli_fetch_array($resultOption)){
							
							$optionID = $row3[0];
							$option = $row3[1];
							if ($row3[2] == 0)
							{
								$isSelect = false;
							}
							else {
								$isSelect = true;
							}
							
							if ($row3[3] == 0)
							{
								$isCorrect = false;
							}
							else {
								$isCorrect = true;
							}
							
							$option = new OptionClass(
									$optionID, 
									$option, 
									$isCorrect, 
									$isSelect);
							array_push($options, $option);
						}
					}
					
					$question = new QuestionClass(
							$questionID, 
							$questionContent, 
							$explanation, 
							$options);
					array_push($questions, $question);
				}
			}
			
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
			array_push($cases, $case);
		}
	}
	header('Content-Type:application/json');
	$myJson = json_encode($cases);
	echo '{"cases":'.$myJson.'}';
}
?>