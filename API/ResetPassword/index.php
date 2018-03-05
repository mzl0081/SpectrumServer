<?php
include '../../database/databaseController.php';

$email = $_GET["email"];
$newPassword = $_GET["password"];
$dbController = new DatabaseController();
$result = $dbController->resetPassword($email, $newPassword);
echo '{"result":'.$result.'}';

?>