<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GETTING STARTED - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/flatpickr/dist/flatpickr.min.js"> </script>
		<script type="module" src="/BlogZone/includes/flatpickr/dist/plugins/monthSelect/index.js"> </script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_setup.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fontawesome-free-5.11.2-web/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/flatpickr/dist/flatpickr.min.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/flatpickr/dist/plugins/monthSelect/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/flatpickr/dist/themes/material_green.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/sample_header.php"); ?>

		<div id="navigation-path" class="p-navigation" style="z-index: 0">
			<div class="p-navigation__row">
				<ul class="p-breadcrumbs">
					<li class="p-breadcrumbs__item">Setup</li>
					<li class="p-breadcrumbs__item"><a href="#introduction">Introduction</a></li>
					<li class="p-breadcrumbs__item"><a href="#basic_information">Basic Information</a></li>
					<li class="p-breadcrumbs__item"><a href="#avatar">Avatar</a></li>
					<li class="p-breadcrumbs__item"><a href="#styles">Styles</a></li>
					<li class="p-breadcrumbs__item"><a href="#external_accounts">External Accounts</a></li>
					<li class="p-breadcrumbs__item"><a href="#final">Final</a></li>
				</ul>
			</div>
		</div>

		<div id="sample_body" class="p-card--highlighted main-card" style="width: 75%;">
			<div id="introduction" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_intro.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">GETTING STARTED</h3>
				<p class="p-card__content u-align-text--center">Customize your page the way you envision it.</p>
				<hr>
				<p>The following pages will help you through setting up your account.</p>
				<p>Remember that you can always change and update data by going to the Settings page or the User-preference page.</p>
				<p>Worry not, provided information and data are safe with us. We respect user privacy and internet freedom. There is no selling of data to third-party for profits.</p>
			</div>

			<div id="basic_information" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_basic_information.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">Basic Personal Information</h3>
				<p class="p-card__content u-align-text--center">Tell us a little bit about yourself</p>
				<hr>
				<form method="POST" id="form_basic_information">
					<fieldset>
						<div class="p-form-validation" name="first_name">
							<label class="p-form__label">First Name</label>
							<input class="p-form-validation__input" type="text" name="first_name">
						</div>
						<div class="p-form-validation" name="middle_name">
							<label class="p-form__label">Middle Name</label>
							<input class="p-form-validation__input" type="text" name="middle_name">
						</div>
						<div class="p-form-validation" name="last_name">
							<label class="p-form__label">Last Name</label>
							<input class="p-form-validation__input" type="text" name="last_name">
						</div>
						<div class="p-form-validation" name="sex">
							<label class="p-form__label">Sex</label>
							<select id="sex">
								<option value="" disabled="disabled" selected="">Select Sex</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</fieldset>

					<fieldset>
						<div class="p-form-validation" name="birthyear">
							<label class="p-form__label">Birth Year</label>
							<select id="birthyear">
								<option value="" disabled="disabled" selected="">Select Birth Year</option>
								<!-- Year Values are generaed in on_setup.js -->
							</select>
						</div>
						<div class="p-form-validation" name="birthmonth">
							<label class="p-form__label">Birth Month</label>
							<input class="flatpickr flatpickr-input active" type="text" name="birthmonth" placeholder="Select Date">
						</div>
						<div class="p-form-validation" name="birthday">
							<label class="p-form__label">Birth Day</label>
							<select id="birthday">
								<option value="" disabled="disabled" selected="">Select Birth Day</option>
								<!-- Day Values are generaed in on_setup.js -->
							</select>
						</div>
					</fieldset>
				</form>
			</div>

			<div id="avatar" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_avatar.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">Avatar</h3>
				<p class="p-card__content u-align-text--center">Earth? Fire? Water? Air?</p>
				<hr>
				<div class="p-card--highlighted">
					<form method="POST" enctype="multipart/form-data">
						<div class="u-align--center">
							<img id="avatar_template" class="p-image--bodered" src="/BlogZone/assets/add_image.svg" alt="avatar" style="width: 50%;">
						</div>
						<hr>
						<div class="u-align--center">
							<div id="avatar_file_upload" class="p-form__group">
								<input type="file" placeholder="path/to/image" readonly name="avatar_file_upload">
								<button type="button" name="btn_upload_avatar" class="p-button--positive">Upload</button>
								<i class="p-icon--spinner u-animation--spin" name="spinner_avatar"></i>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div id="styles" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_styles.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">Styles</h3>
				<p class="p-card__content u-align-text--center">Everything is customizable!</p>
				<hr>
				<div id="sample_dashboard" class="p-card--highlighted">
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
							<h3 class="p-card__title u-align-text--center">Logo</h3>
							<p class="p-card__content u-align-text--center">This will be shown as your logo in the header</p>
							<hr>
							<div class="u-align--center">
								<div id="header_file_upload" class="p-form__group">
									<input type="file" placeholder="path/to/image" readonly name="header_file_upload">
									<button type="button" name="btn_upload_header" class="p-button--positive">Upload</button>
									<i class="p-icon--spinner u-animation--spin" name="spinner_header"></i>
								</div>
							</div>
						</fieldset>
					</form>
					<hr>

					<form method="POST" enctype="multipart/form-data" class="p-form p-form--inline">
						<fieldset>
							<h3 class="p-card__title u-align-text--center">Colors</h3>
							<hr>
							<table>
								<thead>
									<tr>
										<th>Element</th>
										<th>Color Picker</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>Header Background</th>
										<td><input type="color" class="p-form__control" name="header_color_bg"></td>
									</tr>
									<tr>
										<th>Header Text</th>
										<td><input type="color" class="p-form__control" name="header_color_item"></td>
									</tr>
									<tr>
										<th>Text</th>
										<td><input type="color" class="p-form__control" name="header_color_text"></td>
									</tr>
									<tr>
										<th>Body Background</th>
										<td><input type="color" class="p-form__control" name="header_color_body"></td>
									</tr>
									<tr>
										<th>Dashboard Background</th>
										<td><input type="color" class="p-form__control" name="header_color_dashboard"></td>
									</tr>
								</tbody>
							</table>
						</fieldset>
					</form>
					<hr>

					<form method="POST" enctype="multipart/form-data" class="p-form p-form--inline">
						<fieldset>
							<h3 class="p-card__title u-align-text--center">Texts</h3>
							<hr>
							<table>
								<thead>
									<tr>
										<th>Element</th>
										<th>Option</th>
										<th>Value</th>
										<th>Link</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>Header Logo</th>
										<td></td>
										<td></td>
										<td><input type="url" class="p-form__control is-dense" placeholder="URL LOGO" name="header_logo_link"></td>
									</tr>

									<?php
										$arr_logo = [
											array("name" => "Twitter", "logo_name" => "twitter"),
											array("name" => "Facebook", "logo_name" => "facebook"),
											array("name" => "Instagram", "logo_name" => "instagram"),
											array("name" => "LinkedIn", "logo_name" => "linkedin"),
											array("name" => "YouTube", "logo_name" => "youtube"),
										];
										for ($i = 1; $i <= 3; $i++)
										{
											echo "<tr name='tr-text$i'>";
											echo "<th>Text $i</th>";

											echo "<td>";
											echo "<select name='select$i' class='is-dense'>";
											echo "<option value='' disabled='disabled' selected=''>Select Type</option>";
											echo "<option value='text'>Text</option>";
											echo "<option value='logo'>Logo</option>";
											echo "</select>";
											echo "</td>";

											echo "<td id='td-text$i'>";
											echo "<input disabled='' type='text' class='p-form__control is-dense' placeholder='Title Text $i' name='header_text$i'";
											echo "</td>";

											echo "<td id='td-logo$i' class='u-hide'>";
											echo "<select name='logo$i' class='is-dense'>";
											echo "<option value='' disabled='disabled' selected=''>Select Logo</option>";

											for ($n = 0; $n < 5; $n++)
											{
												$logo_name = $arr_logo[$n]["logo_name"];
												$name = $arr_logo[$n]["name"];
												echo "<option value='$logo_name'>$name</option>";
											}
											echo "</select>";
											echo "</td>";
											echo "<td><input type='url' class='p-form__control is-dense' placeholder='URL $i' name='header_link$i'></td>";
											echo "</tr>";
										}
									?>

								</tbody>
							</table>
						</fieldset>
					</form>
				</div>
			</div>

			<div id="external_accounts" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_external_accounts.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">External Accounts</h3>
				<p class="p-card__content u-align-text--center">Make people know you more!</p>
			</div>

			<div id="final" class="content">
				<img class="p-card__thumbnail" src="/BlogZone/assets/setup_final.svg" alt="image">
				<hr class-"u-sv1">
				<h3 class="p-card__title u-align-text--center">Final</h3>
				<p class="p-card__content u-align-text--center">You are almost there. Hang in there!</p>
				<hr>
				<p>(You are about to send the information you have provided. We are going to store it in our database. Please make sure you are satisfied with your input)</p>
				<div class="row">
					<div class="u-align--center">
						<button class="p-button--positive" name="btn_submit">Submit</button>
						<i class="p-icon--spinner u-animation--spin" name="spinner"></i>
					</div>
				</div>
			</div>
		</div>

		<?php //require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
