<?php

// phpinfo();
include 'classes/caseClass.php';

// test data
$caseID = "1";
$caseName = "Case study 10: Oppositional Defiant Disorder";
$caseDescription = "The teacher does not know how to handle the student who has oppositional defiant disorder. In this case, the teacher does not pay much attention to Willy. When Willy's behavior problems appear, the teacher doesn't know how to help Willy and solve the problem by herself. She instead sends him to the positive behavior teacher to correct his behavior. For this scenario, I would like for teachers to be aware of this kind of situation and be encouraged to learn this disorder.";
$caseVideoName = "case_MZL_10";
$caseType = "1";
$caseCoverPic = "case_video_cover_10";
$caseVideoScreenshot = "case_video_screenshot_10";


$teachersNotes = array();
$noteID = "1";
$noteVideo = "case_MZL_10_TN";
$noteCover = "teachers_note_cover_10";
$teachersNote = new TeachersNotesClass($noteID, $noteVideo, $noteCover);
array_push($teachersNotes, $teachersNote);

$questionID = "1";
$questionContent = "Considering Willy's behavioral problems, should he be immediately sent to the Positive Behavior teacher?";
$explanation = "One successful example shows that teachers should pay attention and show respect to students who have oppositional defiant disorder. Because most of time students seek attention from teachers. Sending them to the positive behavior teachers will hurt their confidence and self-esteem. In this case, teachers shouldn't send them immediately to special department when they have behavior problems. And teachers also should know when to show much attention and less attention. For example, show less attention when they don't improve their behavior.";
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
$cases = array();
array_push($cases, $case);

// test echo all data with json format
$myJson = json_encode($cases);
echo '{"cases":'.$myJson.'}';

?>