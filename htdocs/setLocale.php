<?php
	session_cache_expire(999999);
	session_start();
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");	
	$_SESSION["locale"]=$_GET["l"];
	header("Location: ./".$_GET["r"]);
?>
