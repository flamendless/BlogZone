<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

Database::Init();
$tbl = Database::$tbl_user;
$username = Query::Safe($_POST["username"]);
$attempt_password = Query::Safe($_POST["password"]);
$result = Query::Query_Set("SELECT password FROM $tbl WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);
$hashed_password = $row["password"];
$correct = password_verify($attempt_password, $hashed_password);
echo $correct;

?>
