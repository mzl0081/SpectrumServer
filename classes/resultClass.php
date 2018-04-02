<?php
class BLResult{
	
	public static $DeleteDatabaseSuccess = '{"result":2}';
	public static $SendEmailSuccess = '{"result":1}';
	
	public static $MissingParameter = '{"result":-1}';
	public static $InsertDatabaseFails = '{"result":-2}';
	public static $DeleteDatabaseFails = '{"result":-3}';
	public static $UpdateDatabaseFails = '{"result":-4}';
	public static $SelectDatabaseFails = '{"result":-5}';
	public static $SendEmailFails = '{"result":-6}';
	
	public static function BLResults($result){
		return '{"result":'.$result.'}';
	}
}
?>