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
		top: 0; left: 0;
		width: 100%;
	}
</style>
<script type="module" src="/BlogZone/js/on_header.js"></script>
<link rel="stylesheet" type="text/css" href="/BlogZone/includes/fontawesome-free-5.11.2-web/css/all.min.css">

<header id="navigation" class="p-navigation sticky">
	<div class="p-navigation__row">
		<div class="p-navigation__banner">
			<div class="p-navigation__logo">
				<a class="p-navigation__link" href="/">
					<img class="b-lazy b-loaded p-navigation__image" src="/BlogZone/assets/header_logo.svg" alt="BlogZone">
				</a>
			</div>
			<a href="#navigation" class="p-navigation__toggle--open" title="menu">
				<i class="p-icon--menu"></i>
			</a>
			<a href="#navigation-closed" class="p-navigation__toggle--close" title="close_menu">
				<i class="p-icon--close"></i>
			</a>
		</div>
		<nav class="p-navigation__nav">
			<span class="u-off-screen">
				<a href="#main-content">Jump to main content</a>
			</span>
			<ul class="p-navigation__links" role="menu">
				<li class="p-navigation__link is-selected" role="menuitem">
					<a href="#main-content">Home</a>
				</li>
				<li class="p-navigation__link" role="menuitem">
					<a href="#features">Features</a>
				</li>
				<li class="p-navigation__link" role="menuitem">
					<a href="#about-us">About Us</a>
				</li>
				<li class="p-navigation__link" role="menuitem">
					<a href="#contact-us">Contact Us</a>
				</li>
			</ul>
			<ul class="p-navigation__links" role="menu">
				<li class="p-navigation__link is-selected" role="menuitem" name="register">
					<a href="/BlogZone/pages/register.php">Register</a>
				</li>
				<li class="p-navigation__link" role="menuitem" name="login">
					<a href="/BlogZone/pages/login.php">Log In</a>
				</li>
			</ul>
		</nav>
	</div>
</header>
