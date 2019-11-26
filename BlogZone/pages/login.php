<!DOCTYPE html>
<html>
	<head>
		<title>LOG IN - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/fakeloader/dist/fakeLoader.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/utils.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_login.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fakeloader/dist/fakeLoader.min.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/header.php"); ?>

		<div class="p-card--highlighted main-card">
			<h3 class="p-card__title u-align-text--center">LOG IN</h3>
			<p class="p-card__content u-align-text--center">Welcome back dear blogger. We just need a little credential to get you in.</p>
			<br>
			<hr>
			<form method="POST" id="form_login">
				<div class="p-form-validation" name="username">
					<label class="p-form__label">Username</label>
					<input class="p-form-validation__input" type="text" name="username">
					<p class="p-form-validation__message u-hide" name="username-invalid">
						Username does not exist in our database
					</p>
				</div>

				<div class="p-form-validation" name="password">
					<label class="p-form__label">Password</label>
					<input class="p-form-validation__input" type="password" name="password" required="">
				</div>

				<div class="p-form-validation" name="show_password">
					<input id="checkbox_show_password" type="checkbox">
					<label for="checkbox_show_password">Show Password</label>
				</div>

				<div class="p-form-validation" name="remember_me">
					<input id="checkbox_remember_me" type="checkbox">
					<label for="checkbox_remember_me">Remember Me</label>
				</div>

				<br>
				<hr>
				<button type="button" class="p-button--positive" name="btn_login">LOG IN</button>
				<i class="p-icon--spinner u-animation--spin" name="spinner"></i>
			</form>
		</div>

		<div class="fakeLoader"></div>

		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/footer.php"); ?>
	</body>
</html>
