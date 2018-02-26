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
	
	public function __construct(
			$caseID, 
			$caseName, 
			$caseDescription, 
			$caseVideoName, 
			$caseType, 
			$caseCoverPic,
			$caseVideoScreenshot,
			$teachersNotes,
			$questions){
		$this->caseID = $caseID;
		$this->caseName = $caseName;
		$this->caseDescription = $caseDescription;
		$this->caseVideoName = $caseVideoName;
		$this->caseType = $caseType;
		$this->caseCoverPic = $caseCoverPic;
		$this->caseVideoScreenshot = $caseVideoScreenshot;
		$this->teachersNotes = $teachersNotes;
		$this->questions = $questions;
// 		echo("Construct CaseClass:".$this->caseID."<br/>");
	}
	
	public function echoJsonWithAllData()
	{
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>