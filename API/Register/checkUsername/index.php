<?php

include '../../../database/databaseController.php';

$username = $_GET["username"];

$dbController = new DatabaseController();
$result = $dbController->fetchUsername($username);

echo '{"numberOfUsers":'.mysqli_affected_rows($dbController->connection).'}';

?>