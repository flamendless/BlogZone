<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
mysqli_autocommit(Database::$db_connection, false);

$tbl_user = Database::$tbl_user;
$tbl_info = Database::$tbl_info;
$tbl_session = Database::$tbl_session;
$tbl_preference = Database::$tbl_preference;
$tbl_header = Database::$tbl_header;
$tbl_color = Database::$tbl_color;

$username = Query::Safe($_POST["username"]);
$password = Query::Safe($_POST["password"]);
$email = Query::Safe($_POST["email"]);
$date = Query::Safe($_POST["date"]);
$time = Query::Safe($_POST["time"]);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query_user = "INSERT INTO $tbl_user(username, password, email) VALUES('$username', '$hashed_password', '$email');";
$result_user = mysqli_query(Database::$db_connection, $query_user) === TRUE;

$id = mysqli_insert_id(Database::$db_connection);

$query_info = "INSERT INTO $tbl_info(id, date_joined, time_joined, is_first_time) VALUES($id, '$date', '$time', true);";
$result_info = mysqli_query(Database::$db_connection, $query_info) === TRUE;

$query_session = "INSERT INTO $tbl_session(id, date_in, time_in) VALUES('$id', '$date', '$time');";
$result_session = mysqli_query(Database::$db_connection, $query_session) === TRUE;

$query_preference = "INSERT INTO $tbl_preference(user_id) VALUES('$id');";
$result_preference = mysqli_query(Database::$db_connection, $query_preference) === TRUE;

$query_header = "INSERT INTO $tbl_header(user_id) VALUES('$id');";
$result_header = mysqli_query(Database::$db_connection, $query_header) === TRUE;

$query_color = "INSERT INTO $tbl_color(user_id) VALUES('$id');";
$result_color = mysqli_query(Database::$db_connection, $query_color) === TRUE;

mkdir($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/files/" . $username);
mkdir($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/posts/" . $username);

if ($result_user && $result_info && $result_session && $result_preference && $result_header && $result_color)
{
	mysqli_commit(Database::$db_connection);
	echo json_encode(array("result" => true, "id" => $id));
}
else
{
	mysqli_rollback(Database::$db_connection);
	echo json_encode(array(
		"result" => false,
		"id" => $id,
		"user" => $result_user,
		"info" => $result_info,
		"session" => $result_session,
		"preference" => $result_preference,
		"header" => $result_header,
		"color" => $result_color
	));
}

?>
