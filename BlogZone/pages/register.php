<!DOCTYPE html>
<html>
	<head>
		<title>REGISTER - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"> </script>
		<script type="text/javascript" src="/BlogZone/js/utils.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_register.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/header.php"); ?>

		<div class="p-card--highlighted main-card">
			<h3 class="p-card__title u-align-text--center">REGISTER</h3>
			<p class="p-card__content u-align-text--center">It is our joy to have you in BlogZone. We just need a little information to get you started.</p>
			<br>
			<hr>
			<form method="POST" id="form_register">
				<div class="p-form-validation" name="username">
					<label class="p-form__label is-required">Username</label>
					<input class="p-form-validation__input" type="text" name="username">
					<p class="p-form-validation__message" name="username-required">
						This field is required
					</p>
					<p class="p-form-validation__message u-hide" name="username-min">
						<strong>Username must be atleast 8 characters</strong>
					</p>
					<p class="p-form-validation__message u-hide" name="username-max">
						<strong>Username must not exceed 50 characters</strong>
					</p>
					<p class="p-form-validation__message u-hide" name="username-taken">
						<strong>Username is already taken</strong>
					</p>
				</div>

				<div class="p-form-validation" name="email">
					<label class="p-form__label is-required">E-Mail</label>
					<input class="p-form-validation__input" type="text" name="email" required="">
					<p class="p-form-validation__message" name="email-required">
						This field is required
					</p>
					<p class="p-form-validation__message u-hide" name="email-taken">
						<strong>E-Mail is already taken</strong>
					</p>
					<p class="p-form-validation__message u-hide" name="email-valid">
						<strong>E-Mail is not a valid e-mail address</strong>
					</p>
				</div>

				<div class="p-form-validation" name="password">
					<label class="p-form__label is-required">Password</label>
					<input class="p-form-validation__input" type="password" name="password" required="">
					<p class="p-form-validation__message" name="password-required">
						This field is required
					</p>
					<p class="p-form-validation__message u-hide" name="password-min">
						<strong>Password must be atleast 8 characters</strong>
					</p>
					<p class="p-form-validation__message u-hide" name="password-max">
						<strong>Password must not exceed 50 characters</strong>
					</p>
				</div>

				<div class="p-form-validation" name="confirm_password">
					<label class="p-form__label is-required">Confirm Password</label>
					<input class="p-form-validation__input" type="password" name="confirm_password" required="">
					<p class="p-form-validation__message" name="confirm-password-required">
						This field is required
					</p>
					<p class="p-form-validation__message u-hide" name="confirm-password">
						<strong>Password must both match</strong>
					</p>
				</div>

				<div class="p-form-validation" name="accept_term">
					<input id="checkbox_accept_term" type="checkbox">
					<label for="checkbox_accept_term">I have read and agree to the Rules and Regulations</label>
				</div>

				<br>
				<hr>
				<button type="button" class="p-button--positive" name="btn_register">REGISTER</button>
				<i class="p-icon--spinner u-animation--spin" name="spinner"></i>
			</form>
		</div>

		<!-- <label>Already registered? Click <a href="/pages/login.php">here to login</a></label> -->
		<!-- <button type="button" name="btn_register">Register</button> -->

		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/footer.php"); ?>
	</body>
</html>
