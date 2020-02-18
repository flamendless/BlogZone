<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;

$id = Query::Safe($_POST["id"]);
$title = Query::Safe($_POST["title"]);

$result = Query::Query_Set("SELECT author, filename, base_path FROM $tbl_post WHERE id = '$id' AND title = '$title';");
$data = mysqli_fetch_assoc($result);

$filename = $data["filename"];
$base_path = $data["base_path"];
$author = $data["author"];

$path = $base_path . $filename;

$post_content = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/BlogZone" . $path);
echo json_encode(
	array(
		"post_content" => $post_content,
		"author" => $author
	));

?>
