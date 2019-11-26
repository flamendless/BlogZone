<?php

class Database
{
	static $db_connection = NULL;
	static $db_servername = "localhost";
	static $db_username = "root";
	static $db_password = "";
	static $db_name = "blogzone";

	static $tbl_user = "tbl_user";
	static $tbl_info = "tbl_info";
	static $tbl_session = "tbl_session";
	static $tbl_remember = "tbl_remember";
	static $tbl_image = "tbl_image";
	static $tbl_post = "tbl_post";
	static $tbl_post_info = "tbl_post_info";
	static $tbl_preference = "tbl_preference";
	static $tbl_header = "tbl_header";
	static $tbl_color = "tbl_color";

	public static function Init()
	{
		self::$db_connection = mysqli_connect(self::$db_servername, self::$db_username, self::$db_password, self::$db_name);
		if (!self::$db_connection)
			die("Connection to database failed: " . mysqli_connect_error());
		else
			return true;
	}

	public static function Deinit()
	{
		mysqli_close(self::$db_connection);
	}
}

?>
