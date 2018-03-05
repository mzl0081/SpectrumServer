<?php
include '../../../database/databaseController.php';

$username = $_GET["username"];
$userPassword = $_GET["password"];
$userEmail = $_GET["email"];

$dbController = new DatabaseController();
$result = $dbController->insertUser($username, $userPassword, $userEmail);
echo '{"result":'.$result.'}';

?>