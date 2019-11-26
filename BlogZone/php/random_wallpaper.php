<?php

  $bg = array(
	  "/BlogZone/assets/wallpapers/wallpaper1.jpg",
	  "/BlogZone/assets/wallpapers/wallpaper2.jpg",
	  "/BlogZone/assets/wallpapers/wallpaper3.jpg",
	  "/BlogZone/assets/wallpapers/wallpaper4.jpg",
	  "/BlogZone/assets/wallpapers/wallpaper5.jpg",
  );

	$r = rand(0, count($bg) - 1);
	$random_bg = "$bg[$r]";
	echo "<style type='text/css'>";
	echo "body { background-image: url($random_bg); background-size: cover; }";
	echo "</style>";
?>
