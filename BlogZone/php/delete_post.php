<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_post = Database::$tbl_post;
$username = Query::Safe($_POST["username"]);
$title = Query::Safe($_POST["title"]);

$result = Query::Query_Set("SELECT filename, base_path FROM $tbl_post WHERE author = '$username' AND title = '$title'");
$data = mysqli_fetch_assoc($result);
$base_path = $data["base_path"];
$filename = $data["filename"];
$file = $_SERVER["DOCUMENT_ROOT"] . $/BlogZonebase_path . $filename;

$result = unlink($file);

$result2 = Query::Query_NoSet("DELETE FROM $tbl_post WHERE author = '$username' AND title = '$title'");

echo json_encode(array("result1" => $result, "result2" => $result2));
?>
