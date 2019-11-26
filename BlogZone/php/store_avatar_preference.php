<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_image = Database::$tbl_image;
$tbl_preference = Database::$tbl_preference;

$user_id = Query::Safe($_POST["user_id"]);
$filename = Query::Safe($_POST["filename"]);

$result_id = Query::Query_Set("SELECT id FROM $tbl_image WHERE filename = '$filename';");
$id = mysqli_fetch_assoc($result_id)["id"];

$result = Query::Query_NoSet("UPDATE $tbl_preference SET avatar = '$id' WHERE user_id = $user_id;");

echo json_encode(array("id" => $id, "result" => $result));

?>
