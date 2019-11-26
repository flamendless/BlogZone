<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_profile.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_header.php"); ?>

		<div class="p-card--highlighted main-card">
			<h3 class="p-card__title u-align-text--center">PROFILE</h3>
			<p class="p-card__content u-align-text--center"></p>
			<hr>

			<?php
				require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
				require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

				$id = $_SESSION["id"];
				$username = $_SESSION["username"];

				Database::Init();
				$tbl_user = Database::$tbl_user;
				$tbl_info = Database::$tbl_info;
				$tbl_image = Database::$tbl_image;
				$tbl_preference = Database::$tbl_preference;

				$result_avatar = Query::Query_Set("SELECT img.filename, img.rel_path FROM $tbl_image AS img INNER JOIN $tbl_preference AS pref ON pref.user_id = img.id WHERE pref.user_id = '$id'");
				$data_avatar = mysqli_fetch_assoc($result_avatar);
				$filename = $data_avatar["filename"];
				$rel_path = $data_avatar["rel_path"];
				$avatar = $rel_path . $filename;

				$result_info = Query::Query_Set("SELECT user.email, CONCAT_WS(' ', info.first_name, info.middle_name, info.last_name) AS fullname, info.sex, info.birthdate, info.date_joined, info.time_joined, TIMESTAMPDIFF(YEAR, info.birthdate, CURDATE()) AS age FROM $tbl_user AS user INNER JOIN $tbl_info AS info ON user.id = info.id WHERE user.id = '$id';");
				$data_info = mysqli_fetch_assoc($result_info);
				$email = $data_info["email"];
				$fullname = $data_info["fullname"];
				$sex = $data_info["sex"];
				$age = $data_info["age"];
				$birthdate = $data_info["birthdate"];
				$date_joined = $data_info["date_joined"];
				$time_joined = $data_info["time_joined"];

				$birthdate_format = date_format(date_create($birthdate), "F d, Y");
				$date_joined_format = date_format(date_create($date_joined), "F d, Y");
				$time_joined_format = date("h:m:s A", strtotime($time_joined));

				echo "<div class='p-strip is-bordered'>";
					echo "<div class='row'>";
						echo "<div class='u-align--center'>";
							echo "<img class='p-image' src='$avatar' alt='avatar' style='width: 35%'>";
						echo "</div>";
					echo "<h3 class='u-align-text--center'>$fullname</h3>";
					echo "<h5 class='u-align-text--center'>@$username</h5>";
					echo "</div>";
					echo "<hr>";
					echo "<div class='row'>";
						echo "<div class='col-6'>";
						echo "<p>E-Mail: $email</p>";
						echo "<p>Birthdate: $birthdate_format</p>";
						echo "<p>Age: $age</p>";
						echo "<p>Sex: $sex</p>";
						echo "<br>";
						echo "<p>Date Joined: $date_joined_format</p>";
						echo "<p>Time Joined: $time_joined_format</p>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			?>

		</div>

		<?php //require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
