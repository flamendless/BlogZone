<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;
$tbl_post_info = Database::$tbl_post_info;

$username = Query::Safe($_POST["username"]);
$search_query = Query::Safe($_POST["search_query"]);

$result = Query::Query_Set("SELECT p.id, p.author, p.title, p.caption, p.filename, p.base_path, i.date_published, i.time_published FROM $tbl_post AS p INNER JOIN $tbl_post_info AS i ON p.id = i.id WHERE p.author = '$username' AND p.is_published = true AND p.title LIKE '%$search_query%';");

// $content = mysqli_fetch_array($result);

$arr_data = array();

while ($content = mysqli_fetch_assoc($result))
{
	$id = $content["id"];
	$post_author = $content["author"];
	$post_title = $content["title"];
	$post_caption = $content["caption"];
	$post_filename = $content["filename"];
	$post_base_path = $content["base_path"];
	$post_date_published = $content["date_published"];
	$post_time_published = $content["time_published"];

	$path = $post_base_path . $post_filename;
	$post_content = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/BlogZone" . $path);

	$arr = array(
			"id" => $id,
			"author" => $post_author,
			"title" => $post_title,
			"caption" => $post_caption,
			"content" => $post_content,
			"url" => $path,
			"date_published" => $post_date_published,
			"time_published" => $post_time_published,
		);
	array_push($arr_data, $arr);
}

echo json_encode($arr_data);

?>
