<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_GET["title"]; ?>- BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_view.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">

		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/tui-editor-contents.min.css">
		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/github.min.css">

		<link rel="stylesheet" href="/BlogZone/includes/rateyo/jquery.rateyo.min.css">
		<link rel="stylesheet" href="/BlogZone/includes/comments/jquery-comments.css">

		<script src="/BlogZone/includes/tui-editor/tui-editor-Viewer-full.min.js"></script>
		<script src="/BlogZone/includes/rateyo/jquery.rateyo.min.js"></script>
		<script src="/BlogZone/includes/comments/jquery-comments.min.js"></script>

	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_header.php"); ?>

		<div class="p-card main-card" style="width: 80%">
			<div class="row u-align-text--right">
				<form>
					<button type="button" class="p-button--positive" name="btn_edit">Edit</button>
				</form>
			</div>

			<div class="p-card u-clearfix">
				<div class="u-float-right" id="rateYo">
				</div>
			</div>

			<hr>
			<div class="row">
				<h1 name='post_title' class="p-card__title u-align-text--center"></h1>
				<h4 name='post_caption' class="p-card__content u-align-text--center"></h4>
				<p name='post_author' class="p-card__content u-align-text--center"></p>
			</div>
			<br>
			<hr>
			<br>
			<div id="viewer"></div>
		</div>

		<div class="p-card main-card" style="width: 80%">
			<div id="comments">
			</div>
		</div>

		<?php //require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
