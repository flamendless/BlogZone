<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_info = Database::$tbl_info;

$id = Query::Safe($_POST["id"]);
$result = Query::Query_NoSet("UPDATE $tbl_info SET is_first_time = false WHERE id = '$id'");

echo $result;

?>
