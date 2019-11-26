<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

class Query
{
	public static function Query_NoSet($str_query, $die = true)
	{
		Database::Init();
		if ($result = mysqli_query(Database::$db_connection, $str_query) === TRUE)
			return $result;
		else
			if ($die)
				die(mysqli_error(Database::$db_connection));
	}

	public static function Query_Set($str_query)
	{
		Database::Init();
		if ($result = mysqli_query(Database::$db_connection, $str_query))
			return $result;
		else
			if ($die)
				die(mysqli_error(Database::$db_connection));
	}

	public static function Safe($arg)
	{
		return mysqli_real_escape_string(Database::$db_connection, $arg);
	}

	public static function IsEmpty($str)
	{
		$result = Query::Query_Set($str);
		if ($result)
		{
			if (mysqli_num_rows($result) == 0)
			{
				mysqli_free_result($result);
				return true;
			}
			else
			{
				mysqli_free_result($result);
				return false;
			}
		}
	}

	public static function GetID()
	{
		return mysqli_insert_id(Database::$db_connection);
	}
}

?>
