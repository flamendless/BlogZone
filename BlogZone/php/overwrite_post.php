<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;
$tbl_post_info = Database::$tbl_post_info;

$id = Query::Safe($_POST["id"]);
$username = Query::Safe($_POST["username"]);
$title = Query::Safe($_POST["title"]);
$caption = Query::Safe($_POST["caption"]);
$content = Query::Safe($_POST["content"]);
$filename = Query::Safe($_POST["filename"]);
$base_path = Query::Safe($_POST["base_path"]);
$is_published = Query::Safe($_POST["is_published"]);

$date_created = Query::Safe($_POST["date_created"]);
$time_created = Query::Safe($_POST["time_created"]);
$date_published = Query::Safe($_POST["date_published"]);
$time_published = Query::Safe($_POST["time_published"]);

$file = fopen($_SERVER["DOCUMENT_ROOT"] . "/BlogZone" . $base_path . $filename, "w");
fwrite($file, $content);
fclose($file);

echo "overwritten";

?>
