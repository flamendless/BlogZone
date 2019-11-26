<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_image;
$username = $_SESSION["username"];
$date = Query::Safe($_POST["date"]);
$time = Query::Safe($_POST["time"]);
$filename = Query::Safe($_POST["filename"]);
$original_filename = Query::Safe($_POST["original_filename"]);
$filetype = Query::Safe($_POST["filetype"]);
$rel_path = Query::Safe($_POST["rel_path"]);

$query = "INSERT INTO $tbl(uploader, filename, original_filename, rel_path, filetype, upload_date, upload_time) VALUES('$username', '$filename', '$original_filename', '$rel_path', '$filetype', '$date', '$time');";

$result = Query::Query_NoSet($query);

echo $result;

?>
