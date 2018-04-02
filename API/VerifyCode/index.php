<?php

//sample
include '../../classes/resultClass.php';
include '../../database/databaseController.php';


if (isset($_GET["code"]) && isset($_GET["email"])){
	$code = $_GET["code"];
	$email = $_GET["email"];
	
	$dbController = new DatabaseController();
	$result = $dbController->verifyCode($code, $email);
	
	echo '{"result":'.mysqli_affected_rows($dbController->connection).'}';
}
else {
	echo BLError::$MissingParameter;
}

?>