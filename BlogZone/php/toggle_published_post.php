<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;
$username = Query::Safe($_POST["username"]);
$title = Query::Safe($_POST["title"]);

$result = Query::Query_Set("UPDATE $tbl_post SET is_published = !is_published WHERE author = '$username' AND title = '$title'");

echo $result;

?>
