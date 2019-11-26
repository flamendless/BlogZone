<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$file = Query::Safe($_POST["file"]);
$result = unlink($file);
echo $result;

?>
