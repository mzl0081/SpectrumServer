<?php
class TeachersNotesClass
{
	public $noteID;
	public $noteVideo;
	public $noteCover;
	
	public function __construct($noteID,$noteVideo,$noteCover)
	{
		$this->noteID = $noteID;
		$this->noteVideo = $noteVideo;
		$this->noteCover = $noteCover;
		echo("Construct TeachersNoteClass: ".$this->noteID."<br/>");
	}
}
?>