<?php
include '../../../database/databaseController.php';

$username = $_GET["username"];
$userPassword = $_GET["password"];
$userEmail = $_GET["email"];


$serverAddress = 'acadmysql.duc.auburn.edu';
$dbUsername = 'bzl0048';
$dbPassword = 'boningliang';
$database = 'bzl0048db';
$dbController = new DatabaseController(
		$serverAddress,
		$dbUsername,
		$dbPassword,
		$database);
$result = $dbController->insertUser($username, $userPassword, $userEmail);
echo '{"result":'.$result.'}';


?>