<?php
/******
****	Minecraft Skin Cacher
****	Copyright 2020, CunterFuck.com
****	This script was created by
****	SkyWalker, aka SkyWalker3200
****	You are not allowed to modify, download, or redistrute this script without WRITTEN CONSENT
****	From SkyWalker himself.
*******/
require("inc/config.php");
if (isset($_GET['username'])){
	if ($_GET['username'] == ""){
		$u = "default"; // if there's no username specificied, let's setup to show Bob
	}else{
		$u = $_GET['username'];
	}
	$username = mysqli_escape_string($link, $u);
}else{
	$username = "default";
}
include("inc/image.php");

ob_get_clean();
mysqli_close($link);
header("Content-Type: image/png");
// echo file_get_contents($cache_dir.$username.".png");
readfile($cache_dir.$username.".png");
?>