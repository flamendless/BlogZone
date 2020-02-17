<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME - BlogZone</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Where Life And Blogging Happens">
		<script type="text/javascript" src="/BlogZone/includes/jquery-3.4.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/js.cookie-2.2.1.min.js"></script>
		<script type="module" src="/BlogZone/includes/vex/dist/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="/BlogZone/js/utils.js"></script>
		<script type="text/javascript" src="/BlogZone/js/on_load.js"></script>
		<link rel="icon" type="image/png" href="/BlogZone/assets/favicon.png">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fontawesome-free-5.11.2-web/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vanilla-framework/style.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/stylesheets/wrapper.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex.css">
		<link rel="stylesheet" type="text/css" href="/BlogZone/includes/vex/dist/css/vex-theme-os.css">
		<style>
			html::after
			{
				display:block;
				bottom: 0;
				left: 0;
				right: 0;
				top: 0;
				z-index: -1;
				position: absolute;
			}
		</style>
	</head>

	<body>
		<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/pages/header.php"); ?>

		<div id="main-content" class="p-strip--image is-dark is-deep u-no-padding--bottom" style="background-image: url('/BlogZone/assets/main_page_bg.png');">
			<div class="row">
				<h1 class="p-heading--stylized">BlogZone is your home for creativity and ideas. Share to the world without limitation.</h1>
				<ul class="p-list">
					<li class="p-list__item">
						<p><small>Want to begin your creative journey? Register now</small></p>
						<a class="p-button--positive" href="/BlogZone/pages/register.php">Sign Up</a>
					</li>
					<li class="p-list__item">
						<p><small>Already registered? Continue your blogging life now</small></p>
						<a class="p-button--positive" href="/BlogZone/pages/login.php">Log In</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="features" class="p-strip is-bordered is-deep">
			<div class="row">
				<h1 class="p-muted-heading u-align-text--center">FEATURES</h1>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/editor.svg" alt="editor icon">
							<h3 class="p-heading-icon__title">
								<abbr title="What You See Is What You Get">WYSIWYG</abbr> Editor
							</h3>
							<p>Create beautiful content without learning to code, allowing you to write efficiently. See live preview of your document on the spot.</p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/cms.svg" alt="cms icon">
							<h3 class="p-heading-icon__title">
								<abbr title="Content Management System">CMS</abbr>
							</h3>
							<p>We take care of your digital content. Just focus on writing.</p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/simple.svg" alt="simple icon">
							<h3 class="p-heading-icon__title">Simple</h3>
							<p>Simple and clean interface that help you focus on making your content without any distraction.</p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/responsive.svg" alt="responsive icon">
							<h3 class="p-heading-icon__title">Responsive</h3>
							<p>BlogZone is responsive, allowing you to reach out to everyone in the world, be it for mobile or desktop.</p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/secure.svg" alt="secure icon">
							<h3 class="p-heading-icon__title">Secure</h3>
							<p>No ads. No malware. No selling of your data. All your information is safe with us.</p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="p-heading-icon">
						<div class="p-heading-icon__header is-stacked">
							<img class="b-lazy b-loaded p-heading-icon__img" src="/BlogZone/assets/open_source.svg" alt="open-source icon">
							<h3 class="p-heading-icon__title">Open-source</h3>
							<p>You can contribute, extend, improve, report bug and issue, ask for feature. All is available in GitHub.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="about-us" class="p-strip is-bordered">
			<div class="row">
				<h1 class="p-muted-heading u-align-text--center">ABOUT US</h1>
			</div>
			<div class="row">
				<?php
					$path = "/BlogZone/assets/team";
					$arr = [
						array(
							"name" => "alex",
							"fullname" => "Alex Bendo",
							"title" => "Lover Boy",
							"url" => "https://www.facebook.com/alex.bendo.7"
						),
						array(
							"name" => "brandon",
							"fullname" => "Brandon Lim-it",
							"title" => "The Perfectionist",
							"url" => "flamendless.github.io"
						),
						array(
							"name" => "jaykel",
							"fullname" => "Jaykel Punay",
							"title" => "Hard Worker",
							"url" => "https://www.facebook.com/jake.punay.9"
						),
						array(
							"name" => "wendell",
							"fullname" => "Wendell Arhgel Romasanta",
							"title" => "Big Eyes",
							"url" => "https://www.facebook.com/wendellvhozz.romasanta"
						),
						array("name" => "", "fullname" => "", "title" => "", "url" => ""),
						array(
							"name" => "aeron",
							"fullname" => "Aeron John Villanueva",
							"title" => "Coffee is Life",
							"url" => "https://www.facebook.com/Aeronjohn13"
						),
					];
					for ($i = 0; $i < count($arr); $i++)
					{
						$name = $arr[$i]["name"];
						$fullname = $arr[$i]["fullname"];
						$title = $arr[$i]["title"];
						$url = $arr[$i]["url"];
						echo "<div class='col-4' style='margin: 0px;'>";
						echo "<ul class='p-inline-images'>";
						echo "<li class='p-inline-images__item'>";
						echo "<a href=$url>";
						echo "<img class='p-inline-images' src='$path/$name.png' alt='$name'>";
						echo "</a>";
						echo "<h5>$fullname</h5>";
						echo "<h6>$title</h6>";
						echo "</li>";
						echo "</ul>";
						echo "</div>";
					}
				?>
			</div>
		</div>

		<div id="contact-us" class="p-strip--light is-bordered">
			<div class="row">
				<h1 class="p-muted-heading u-align-text--center">CONTACT US</h1>
			</div>
			<div class="row">
				<?php
					$arr = [
						array("url" => "https://twitter.com/flamendless", "name" => "twitter.svg", "title" => "Twitter"),
						array("url" => "https://github.com/flamendless/BlogZone", "name" => "github.svg", "title" => "GitHub"),
						array("url" => "mailto:flamendless8@gmail.com", "name" => "email.svg", "title" => "E-Mail"),
					];
					for ($i = 0; $i < count($arr); $i++)
					{
						$url = $arr[$i]["url"];
						$path = "/BlogZone/assets/" . $arr[$i]["name"];
						$title = $arr[$i]["title"];
						$alt = $title . "Logo";
						echo "<div class='col-small-2 col-medium-2 col-4' style='margin: auto;'>";
						echo "<a href=$url>";
						echo "<img class='b-lazy b-loaded' src='$path' alt='$alt' width='72'>";
						echo "<p class='u-align-text--center'>$title</p>";
						echo "</a>";
						echo "</div>";
					}
				?>
			</div>
		</div>

		<hr>

		<!-- TODO add showcase of the WYSIWYG editor -->

		<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/BlogZone/pages/footer.php"); ?>
	</body>
</html>
