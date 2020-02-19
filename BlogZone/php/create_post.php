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

$filepath = $_SERVER["DOCUMENT_ROOT"] . "/BlogZone" . $base_path . $filename;

$new_file = fopen($filepath, "w");
fwrite($new_file, $content);

$result_post = Query::Query_NoSet("INSERT INTO $tbl_post(author, title, caption, filename, base_path, is_published) VALUE('$username', '$title', '$caption', '$filename', '$base_path', $is_published);");
$id = Query::GetID();
$result_info = Query::Query_NoSet("INSERT INTO $tbl_post_info(id, date_created, time_created, date_published, time_published) VALUE('$id', '$date_created', '$time_created', '$date_published', '$time_published');");

echo json_encode(
	array(
		"method" => "new",
		"filepath" => $filepath
	));

?>
