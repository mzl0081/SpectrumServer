<?php
include 'optionClass.php';

class QuestionClass
{
	public $questionID;
	public $questionContent;
	public $explanation;
	public $options;
	
	public function __construct()
	{
		$this->options = new OptionClass();
		echo("Construct QuestionClass<br/>");
	}
}
?>