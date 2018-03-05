<?php
class UserClass{
	public $username;
	public $password;
	public $displayName;
	public $email;
	
	public function __construct(
			$username, 
			$password, 
			$displayName, 
			$email){
		$this->username = $username;
		$this->password = $password;
		$this->displayName = $displayName;
		$this->email = $email;
	}
}

?>