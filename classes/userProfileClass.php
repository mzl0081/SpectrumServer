<?php

class UserProfileClass {
	public $username;
	public $displayName;
	public $email;
	public $avatar;
	
	public function __construct(
			$username,
			$displayName,
			$email,
			$avatar){
				$this->username = $username;
				$this->displayName = $displayName;
				$this->email = $email;
				$this->avatar = $avatar;
	}
}