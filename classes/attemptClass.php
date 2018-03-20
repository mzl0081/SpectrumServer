<?php
class AttemptClass{

	public $optionID;
	public $isSelect;

	public function __construct(
			$optionID,
			$isSelect){
				$this->optionID = $optionID;
				$this->isSelect = $isSelect;
	}
}

?>