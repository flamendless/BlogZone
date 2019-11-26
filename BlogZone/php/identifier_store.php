<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_remember;
$identifier = Query::Safe($_POST["identifier"]);
$username = Query::Safe($_POST["username"]);
$token = password_hash($identifier, PASSWORD_DEFAULT);

$check_username = Query::Query_Set("SELECT username FROM $tbl WHERE username = '$username';");
$check_row = mysqli_num_rows($check_username);
mysqli_free_result($check_username);
if ($check_row > 0)
{
	$result = Query::Query_NoSet("UPDATE $tbl SET token = '$token', identifier = '$identifier' WHERE username = '$username';");
	echo $result;
}
else
{
	$result = Query::Query_NoSet("INSERT INTO $tbl(username, token, identifier) VALUES('$username', '$token', '$identifier');");
	echo $result;
}

?>
