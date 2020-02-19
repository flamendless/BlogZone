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
<script type="module" src="/BlogZone/js/on_sample_header.js"></script>
<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fontawesome-free-5.11.2-web/css/all.min.css">

<div id="sample_header" class="p-navigation sticky">
	<div class="p-navigation__row">
		<div class="p-navigation__row">
			<div class="p-navigation__banner">
				<div class="p-navigation__logo">
					<a id="user_logo" class="p-navigation__link" href="javascript:void(0);">
						<img id="template_header" class="b-lazy b-loaded p-navigation__image" src="/BlogZone/assets/template_header.svg" alt="template_header">
					</a>
				</div>
			</div>
			<div class="p-navigation__nav">
				<ul class="p-navigation__links" role="menu">
					<li class="p-navigation__link is-selected" role="menuitem">
						<a id="text1" href="javascript:void(0);">
							TEXT 1
						</a>
					</li>
					<li class="p-navigation__link is-selected" role="menuitem">
						<a id="text2" href="javascript:void(0);">TEXT 2</a>
					</li>
					<li class="p-navigation__link is-selected" role="menuitem">
						<a id="text3" href="javascript:void(0);">TEXT 3</a>
					</li>
				</ul>
			</div>

			<ul class="p-navigation__links" role="menu">
				<li id="subnav" class="p-navigation__link p-subnav" role="menuitem">
					<a class="p-subnav__toggle" aria-controls="account-menu" aria-expanded="false">
						My Account
					</a>
					<ul id="account-menu" class="p-subnav__items--right" aria-hidden="true" name="subnav_item">
						<li>
							<a href="/BlogZone/pages/profile.php" onclick="" class="p-subnav__item">
								<i class="fa fa-user-circle"></i>
								Profile
							</a>
						</li>
						<li>
							<a href="/BlogZone/pages/settings.php" onclick="" class="p-subnav__item">
								<i class="fa fa-cog"></i>
								Settings
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
		</div>
	</div>
</div>
