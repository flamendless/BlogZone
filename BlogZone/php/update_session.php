<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_session;
$date = Query::Safe($_POST["date"]);
$time = Query::Safe($_POST["time"]);
$id = Query::Safe($_POST["id"]);
$is_empty = Query::IsEmpty("SELECT id FROM $tbl WHERE id = '$id';");
if ($is_empty)
{
	$result = Query::Query_NoSet("INSERT INTO $tbl(id, date_in, time_in) VALUES('$id', '$date', '$time');");
	echo $result;
}
else
{
	$result = Query::Query_NoSet("UPDATE $tbl SET date_in = '$date', time_in = '$time' WHERE id = '$id';");
	echo $result;
}

?>
