<?php
include 'caseClass.php';

// test data
$caseID = "1";
$caseName = "Case study 10: Oppositional Defiant Disorder";
$caseDescription = "";
$caseVideoName = "";
$caseType = "";
$caseCoverPic = "";
$caseVideoScreenshot = "";


$teachersNotes = array();
$noteID = "1";
$noteVideo = "";
$noteCover = "";
$teachersNote = new TeachersNotesClass($noteID, $noteVideo, $noteCover);
array_push($teachersNotes, $teachersNote);

$questionID = "1";
$questionContent = "";
$explanation = "";
$options = array();
$option1 = new OptionClass(
		"1", 
		"Yes, Willy should be sent to the Positive Behavior teacher.", 
		false, 
		false);
$option2 = new OptionClass(
		"2", 
		"No, Willy shouldn't be sent to the Positive Behavior teacher.",
		true, 
		false);
array_push($options, $option1,$option2);
$question = new QuestionClass($questionID, $questionContent, $explanation, $options);
$questions = array();
array_push($questions, $question);
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

?>