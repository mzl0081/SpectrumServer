<?php
include 'optionClass.php';

class QuestionClass
{
	public $questionID;
	public $questionContent;
	public $explanation;
	public $options;
	
	public function __construct($questionID,$questionContent,$explanation,$options)
	{
		$this->questionID = $questionID;
		$this->questionContent = $questionContent;
		$this->explanation = $explanation;
		$this->options = $options;
// 		echo("Construct QuestionClass: ".$this->questionID."<br/>");
	}
}
?>