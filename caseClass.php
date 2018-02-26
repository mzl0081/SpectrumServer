<?php
include 'teachersNotesClass.php';
include 'questionClass.php';

class CaseClass
{
	public $caseID;
	public $caseName;
	public $caseDescription;
	public $caseVideoName;
	public $caseType;
	public $caseCoverPic;
	public $caseVideoScreenshot;
	public $teachersNotes;
	public $questions;
	
	public function __construct(){
		$this->teachersNotes = new TeachersNotesClass();
		$this->questions = new QuestionClass();
		echo("Construct CaseClass<br/>");
	}
}
?>