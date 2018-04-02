<?php
include '../../../database/databaseController.php';
include '../../classes/resultClass.php';


if (isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["email"])) {
	$username = $_GET["username"];
	$userPassword = $_GET["password"];
	$userEmail = $_GET["email"];
	
	$dbController = new DatabaseController();
	$result = $dbController->insertUser($username, $userPassword, $userEmail);
	echo '{"result":'.$result.'}';
}
else {
	echo BLError::$MissingParameter;
}
?>