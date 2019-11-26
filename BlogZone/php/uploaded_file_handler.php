<?php

//ERROR CODE:
//0 - no error (illogical and nonsense, yes)
//1 - file already exists (stored in the local folder)

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

$username = $_SESSION["username"];
$valid_type = array("jpeg", "jpg", "png", "gif");
$filename = $_FILES["file"]["name"];
$tmp = $_FILES["file"]["tmp_name"];
$size = $_FILES["file"]["size"];
$error = $_FILES["file"]["error"];
$type = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$unique = hash("sha256", $filename);
$base_filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $unique);
$base_path = $_SERVER["DOCUMENT_ROOT"] . "/BlogZone/files/" . $username . "/";
$rel_path = "/files/" . $username . "/";

if (!file_exists($base_path))
	mkdir($base_path);

$target = $base_path . $unique;

$message = "";
$valid = true;
$error_code = 0;

if ($error)
{
	$message = $error;
	$valid = false;
}

if (!in_array($type, $valid_type))
{
	$message .= "File must be an Image type (png, jpg, gif, jpeg).";
	$valid = false;
}

if (file_exists($target))
{
	$message .= "File already exists.";
	$valid = false;
	$error_code = 1;
}

if ($size > 3000000)
{
	$message .= "File must not exceed 3mb.";
	$valid = false;
}

if ($valid)
{
	if (!move_uploaded_file($tmp, $target))
	{
		$message = "Failed to move file.";
		$valid = false;
	}
}

$info = array("filename" => $unique, "original_filename" => $filename, "rel_path" => $rel_path, "filetype" => $type);
echo json_encode(array("valid" => $valid, "message" => $message, "info" => $info, "error_code" => $error_code));

?>
