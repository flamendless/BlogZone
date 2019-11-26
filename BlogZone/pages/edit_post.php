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
		<script type="text/javascript" src="/BlogZone/js/on_edit_post.js"></script>
		<script type="text/javascript" src="/BlogZone/js/post.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">

		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/tui-editor.min.css">
		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/tui-editor-contents.min.css">
		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/github.min.css">
		<link rel="stylesheet" href="/BlogZone/includes/tui-editor/codemirror.css">
		<script src="/BlogZone/includes/tui-editor/tui-editor-Editor-full.min.js"></script>

	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_header.php"); ?>

		<div class="p-card main-card" style="width: 80%">
			<div class="row u-align-text--right">
				<form>
					<button type="button" class="p-button--positive" name="btn_save">Save</button>
					<button type="button" class="p-button--negative" name="btn_discard">Discard</button>
				</form>
			</div>
			<hr>
			<div id="editor"></div>
		</div>

		<?php //require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
