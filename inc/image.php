<?php
require("functions.php");
// error_reporting(E_ALL);
/******
****	Minecraft Skin Cacher
****	Copyright 2020, CunterFuck.com
****	This script was created by
****	SkyWalker, aka SkyWalker3200
****	You are not allowed to modify, download, or redistrute this script without WRITTEN CONSENT
****	From SkyWalker himself.
*******/
if ($username !== "default"){
	$link = mysqli_connect($ip, $user, $pw, $db);

	// check database for cache...
	$q = mysqli_query($link, "SELECT `id` FROM `mcmmo_images` WHERE `username` = '". $username ."';");
	$n = mysqli_num_rows($q);
	$t = time();

	// cache column is used for next update.. e.g. time()+86400
	// 24 hour + $t. num of days to cache before update
	$c = $t+($cache_time*76800);

	// if the username is not in the database...
	if ($n == 0){
		// add username to database with information
		$insert = mysqli_query($link, "INSERT INTO `mcmmo_images` (`id`, `username`, `date_created`, `cache`) VALUES (NULL, '". $username ."', '". $t ."', '". $c ."');");

		// download avatar and save it.
		download("https://minotar.net/body/".$username.".png", $cache_dir.$username.".png");
	}else{ //check cache time...
		$q = mysqli_query($link, "SELECT `id`, `cache` FROM `mcmmo_images` WHERE `username` = '". $username ."';");
		$a = mysqli_fetch_array($q);
		
		// update image...
		if ($a['cache'] < $c){
			// download avatar and save it.
			download("https://minotar.net/body/".$username.".png", $cache_dir.$username.".png");
			
			// fix constant downloads - update cache duh
			$duh = mysqli_query($link,"UPDATE `mcmmo_images` SET `cache` = ". $c ." WHERE `id` = ". $a['id'] ."; ");
		}
	}
}
?>