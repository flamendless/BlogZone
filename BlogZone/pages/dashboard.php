<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DASHBOARD - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_dashboard.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/pages/user_header.php"); ?>

		<br>
		<div class="row">
			<div class="row u-align-text--right">
				<form>
					<button type="button" class="p-button--positive p-tooltip--btm-right" aria-describedby="btm-right" name="btn_list">
						<span class="p-tooltip__message" role="tooltip">Display by List View</span>
						<i class="fa fa-grip-lines"></i>
					</button>
					<button type="button" class="p-button--positive p-tooltip--btm-center" aria-describedby="btm-center" name="btn_grid">
						<span class="p-tooltip__message" role="tooltip">Display by Grid View</span>
						<i class="fa fa-th-large"></i>
					</button>
				</form>
			</div>
		</div>

		<!-- posts are generated using JQuery in on_dashboard.js -->
		<div name="main_view"></div>

		<?php //require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
