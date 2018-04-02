<?php
include '../../database/databaseController.php';

$dbController = new DatabaseController();
if (isset($_GET("t"))) {
	if ($_GET("t")=="like") {
		if (isset($_GET("operate")) && isset($_GET("likeID"))) {
			if ($_GET("operate")=="delete") {
				$result = $dbController->deleteLikeByLikeID();
				if ($result==false) {
					echo BLResult::$DeleteDatabaseFails;
				}
				else {
					echo BLResult::$DeleteDatabaseSuccess;
				}
			}
			else {
				BLResult::$MissingParameter;
			}
		}
		else {
			BLResult::$MissingParameter;
		}
	}
	elseif ($_GET("t")=="dislike") {
		
	}
}

?>