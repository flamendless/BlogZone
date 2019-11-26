<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_remember;
$username = Query::Safe($_POST["username"]);
$identifier = Query::Safe($_POST["identifier"]);
$result = Query::Query_Set("SELECT token FROM $tbl WHERE identifier = '$identifier' AND username = '$username';");
if ($result)
{
	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		$hashed_token = $row["token"];
		$correct = password_verify($identifier, $hashed_token);
		echo json_encode(array("correct" => $correct, "username" => $username));
	}
	else
		echo json_encode(array("correct" => false, "username" => $username));
}
else
	echo json_encode(array("correct" => false, "username" => $username));

?>
