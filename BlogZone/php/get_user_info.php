<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl_image = Database::$tbl_image;

$username = Query::Safe($_POST["username"]);

$result = Query::Query_Set("SELECT * FROM $tbl_image WHERE uploader = '$username'");
if ($result)
{
	if (mysqlu_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($row);
		$filename = $row["filename"];
		$rel_path = $row["rel_path"];
		$filetype = $row["filetype"];
		echo json_encode(array(
			"filename" => $filename,
			"rel_path" => $rel_path,
			"filetype" => $filetype,
		));
	}
}

return false;

?>
