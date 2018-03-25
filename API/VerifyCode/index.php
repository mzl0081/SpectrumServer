<?php

//sample


$code = $_GET["code"];
$email = $_GET["email"];

include '../../database/databaseController.php';


$dbController = new DatabaseController();
$result = $dbController->verifyCode($code, $email);

echo '{"result":'.mysqli_affected_rows($dbController->connection).'}';

?>