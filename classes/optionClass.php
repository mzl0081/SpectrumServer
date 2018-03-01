<?php
class OptionClass
{
	public $optionID;
	public $option;
	public $isCorrect;
	public $isSelect;
	
	public function __construct($optionID, $option, $isCorrect, $isSelect)
	{
		$this->optionID = $optionID;
		$this->option = $option;
		$this->isCorrect = $isCorrect;
		$this->isSelect = $isSelect;
// 		echo("Construct OptionClass: ".$this->optionID."<br/>");
	}
}
?>