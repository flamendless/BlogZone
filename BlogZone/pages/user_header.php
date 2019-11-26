<?php
	$status = session_status();
	if ($status == PHP_SESSION_NONE)
		session_start();
?>

<!DOCTYPE html>
<style>
	.fixed
	{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
	}
</style>

<script type="text/javascript" src="/BlogZone/js/utils.js"></script>
<script type="module" src="/BlogZone/js/on_user_header.js"></script>
<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fontawesome-free-5.11.2-web/css/all.min.css">

<header id="user_header" class="p-navigation sticky">
	<div class="p-navigation__row">
		<div class="p-navigation__banner">
			<div class="p-navigation__logo">
				<a class="p-navigation__link" href="/BlogZone/pages/dashboard.php">
					<img id="user_header_logo" class="b-lazy b-loaded p-navigation__image" src="/BlogZone/assets/header_logo.svg" alt="BlogZone">
				</a>
			</div>
			<a href="#user_header" class="p-navigation__toggle--open" title="menu">
				<i class="p-icon--menu"></i>
			</a>
			<a href="#user_header-closed" class="p-navigation__toggle--close" title="close_menu">
				<i class="p-icon--close"></i>
			</a>
		</div>

		<nav class="p-navigation__nav">
			<ul class="p-navigation__links" role="menu">
				<li class="p-navigation__link is-selected" role="menuitem">
					<a href="/BlogZone/pages/dashboard.php">Dashboard</a>
				</li>
			</ul>

			<ul class="p-navigation__links" role="menu">
				<li id="post_subnav" class="p-navigation__link p-subnav" role="menuitem">
					<a class="p-subnav__toggle" aria-controls="post-menu" aria-expanded="false">
						Post
					</a>
					<ul id="post-menu" class="p-subnav__items--right" aria-hidden="true" name="subnav_item">
						<li>
							<a id="new_post" href="javascript:void(0);" class="p-subnav__item">
								<i class="fa fa-plus"></i>
								Create New Post
							</a>
							<a href="/BlogZone/pages/view_all_posts.php" class="p-subnav__item">
								<i class="fa fa-list"></i>
								View All Posts
							</a>
						</li>
					</ul>
				</li>

				<li id="account_subnav" class="p-navigation__link p-subnav" role="menuitem">
					<a class="p-subnav__toggle" aria-controls="account-menu" aria-expanded="false">
						My Account
					</a>
					<ul id="account-menu" class="p-subnav__items--right" aria-hidden="true" name="subnav_item">
						<li>
							<a href="/BlogZone/pages/profile.php" class="p-subnav__item">
								<i class="fa fa-user-circle"></i>
								Profile
							</a>
						</li>
						<li>
							<a href="/BlogZone/pages/settings.php" class="p-subnav__item">
								<i class="fa fa-cog"></i>
								Settings
							</a>
						</li>
						<li>
							<a href="/BlogZone/php/backup_data.php" class="p-subnav__item">
								<i class="fa fa-file-download"></i>
								Backup Data
							</a>
						</li>
						<li>
							<a href="javascript:void(0);" onclick="LogOut();" class="p-subnav__item">
								<i class="fa fa-sign-out-alt"></i>
								Log Out
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>
