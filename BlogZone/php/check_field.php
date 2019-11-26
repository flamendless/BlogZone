<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/includes/email_validator/Validator.php");
$validator = new \EmailValidator\Validator();

Database::Init();
$tbl = Database::$tbl_user;
if (isset($_POST["username"]))
{
	$username = Query::Safe($_POST["username"]);
	$valid = Query::IsEmpty("SELECT id FROM $tbl WHERE username = '$username';");
	echo $valid;
}
else if (isset($_POST["email"]))
{
	$email = Query::Safe($_POST["email"]);
	$form = $validator->isEmail($email);
	$valid = Query::IsEmpty("SELECT id FROM $tbl WHERE email = '$email';");

	echo json_encode(array("form" => $form, "valid" => $valid));
}

?>
