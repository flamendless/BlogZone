<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_user = Database::$tbl_user;
$tbl_info = Database::$tbl_info;
$username = Query::Safe($_POST["username"]);
$result = Query::Query_Set("SELECT a.id, b.is_first_time FROM $tbl_user AS a INNER JOIN $tbl_info AS b ON a.id = b.id WHERE username = '$username';");

$data = mysqli_fetch_array($result);
$id = $data["id"];
$is_first_time = $data["is_first_time"];

$_SESSION["id"] = $id;
$_SESSION["username"] = $username;
$_SESSION["is_first_time"] = $is_first_time;

echo json_encode(array("result" => $result == TRUE, "id" => $id, "is_first_time" => $is_first_time));

?>
