<?php

include '../../database/databaseController.php';
include '../../classes/resultClass.php';


if (isset($_GET["username"]) && isset($_GET["password"])) {
	$username = $_GET["username"];
	$password = $_GET["password"];
	
	$dbController = new DatabaseController();
	$dbController->login($username, $password);
	echo '{"result":'.mysqli_affected_rows($dbController->connection).'}';
}
else {
	echo BLError::$MissingParameter;
}


?>