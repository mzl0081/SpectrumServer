<?php
include '../../database/databaseController.php';
include '../../classes/userProfileClass.php';

$t = $_GET["t"];
$userAccount = $_GET["username"];
$userPassword = $_GET["password"];

$dbController = new DatabaseController();
if ($t == "profile")
{
	$result = $dbController->userProfile(
			$userAccount, 
			$userPassword);
	
	if( $result == false ){
		echo '{\'result\':0}';
	}
	else{
		$profile = "";
		while ($row = mysqli_fetch_array($result)) {
			$username = $row[0];
			$email = $row[1];
			$displayName = $row[2];
			$avatar = $row[3];
		
			$profile = new UserProfileClass(
					$username, 
					$displayName, 
					$email, 
					$avatar);
			echo json_encode($profile);
		}
	}
}
?>