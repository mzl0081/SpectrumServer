<?php

include '../../database/databaseController.php';

$username = $_GET["username"];
$password = $_GET["password"];

$dbController = new DatabaseController();
$dbController->login($username, $password);
echo '{"result":'.mysqli_affected_rows($dbController->connection).'}';

?>