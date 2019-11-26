<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_session;
$date = Query::Safe($_POST["date"]);
$time = Query::Safe($_POST["time"]);
$id = Query::Safe($_POST["id"]);
$result = Query::Query_NoSet("UPDATE $tbl SET date_out = '$date', time_out = '$time' WHERE id = '$id';");
echo $result;

?>
