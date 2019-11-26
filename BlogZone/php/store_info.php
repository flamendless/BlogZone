<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_info = Database::$tbl_info;
$tbl_header = Database::$tbl_header;
$tbl_color = Database::$tbl_color;

$id = Query::Safe($_POST["id"]);
$fname = Query::Safe($_POST["fname"]);
$mname = Query::Safe($_POST["mname"]);
$lname = Query::Safe($_POST["lname"]);
$sex = Query::Safe($_POST["sex"]);
$birthdate = Query::Safe($_POST["birthdate"]);

$result_info = Query::Query_NoSet("UPDATE $tbl_info SET first_name = '$fname', middle_name = '$mname', last_name = '$lname', sex = '$sex', birthdate = '$birthdate', is_first_time = false WHERE id = $id;", false);

$item1 = Query::Safe($_POST["item1"]);
$item2 = Query::Safe($_POST["item2"]);
$item3 = Query::Safe($_POST["item3"]);
$link0 = Query::Safe($_POST["link0"]);
$link1 = Query::Safe($_POST["link1"]);
$link2 = Query::Safe($_POST["link2"]);
$link3 = Query::Safe($_POST["link3"]);

$result_header = Query::Query_NoSet("UPDATE $tbl_header SET item1 = '$item1', item2 = '$item2', item3 = '$item3', link1 = '$link1', link2 = '$link2', link3 = '$link3' WHERE user_id = $id;", false);

$color_header_bg = Query::Safe($_POST["color_header_bg"]);
$color_header_item = Query::Safe($_POST["color_header_item"]);
$color_header_text = Query::Safe($_POST["color_header_text"]);
$color_dashboard = Query::Safe($_POST["color_dashboard"]);
$color_body = Query::Safe($_POST["color_body"]);

$result_color = Query::Query_NoSet("UPDATE $tbl_color SET header_bg = '$color_header_bg', header_item = '$color_header_item', dashboard_bg = '$color_dashboard', text = '$color_header_text', body = '$color_body' WHERE user_id = '$id';", false);

echo true;

?>
