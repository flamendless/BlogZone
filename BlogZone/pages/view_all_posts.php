<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>All Posts - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_view_all_posts.js"></script>
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
	</head>

	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/php/random_wallpaper.php"); ?>

	<body>
		<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_header.php"); ?>

		<div class="p-card--highlighted main-card" style="width: 80%">
			<h3 class="p-card__title u-align-text--center">POSTS</h3>
			<p class="p-card__content u-align-text--center"></p>
			<hr>

			<?php
				require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/query.php");
				require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/php/database.php");

				$id = $_SESSION["id"];
				$username = $_SESSION["username"];

				Database::Init();
				$tbl_post = Database::$tbl_post;

				$result_post = Query::Query_Set("SELECT title FROM $tbl_post WHERE author = '$username';");

				echo "<div class='p-strip is-bordered'>";
					echo "<table>";
  						echo "<thead>";
    						echo "<tr>";
      						echo "<th>Title</th>";
      						echo "<th>Action 1</th>";
      						echo "<th>Action 2</th>";
    						echo "</tr>";
  						echo "</thead>";
  						echo "<tbody>";

							while ($row = mysqli_fetch_assoc($result_post))
							{
								$post_title = $row["title"];
								$action_1 = "<button type='button' class='p-button--positive is-dense' name='btn_edit' value='$post_title'>Edit</button>";
								$action_2 = "<button type='button' class='p-button--negative is-dense' name='btn_delete' value='$post_title'>Delete</button>";
    							echo "<tr>";
      								echo "<th>$post_title</th>";
      								echo "<td>$action_1</td>";
      								echo "<td>$action_2</td>";
    							echo "</tr>";
							}

  						echo "</tbody>";
					echo "</table>";
				echo "</div>";
			?>

		</div>

		<?php //require_once($_SERVER["DOCUMENT_ROOT"] . "/BlogZone/pages/user_footer.php"); ?>
	</body>
</html>
