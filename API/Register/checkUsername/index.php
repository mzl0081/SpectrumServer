<?php

include '../../../database/databaseController.php';

$username = $_GET["username"];

$serverAddress = 'acadmysql.duc.auburn.edu';
$dbUsername = 'bzl0048';
$dbPassword = 'boningliang';
$database = 'bzl0048db';
$dbController = new DatabaseController(
		$serverAddress,
		$dbUsername,
		$dbPassword,
		$database);
$result = $dbController->fetchUsername($username);

echo '{"numberOfUsers":'.mysqli_affected_rows($dbController->connection).'}';

?>