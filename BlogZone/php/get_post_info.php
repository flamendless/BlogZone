<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;

$username = Query::Safe($_POST["username"]);
$id = Query::Safe($_POST["id"]);

$result = Query::Query_Set("SELECT * FROM $tbl_post WHERE id = '$id' AND author = '$username';");
$data = mysqli_fetch_assoc($result);

$title = $data["title"];
$author = $data["author"];
$caption = $data["caption"];

echo json_encode(array("title" => $title, "author" => $author, "caption" => $caption));

?>
