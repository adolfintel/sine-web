<div id="header">
<div id="nav">
<?php
//autodetect language if not already set
if(!isset($_SESSION["locale"])){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if($lang=="it") $_SESSION["locale"]="it"; else $_SESSION["locale"]="en";
}
?>
<img src="images/logoXLTransp.png" alt="Logo" id="logo" onclick="document.location.href='index.php'"/>
<img id="campaign-icon" src="images/campaign-icon.png" alt="logo" style="display:none"/> <!-- SOCIAL NETWORK CRAP -->
<a href="index.php">Home</a>
<a href="webapp/index.php">Web app</a>
<a href="presets.php"><?=$_SESSION["locale"]=="it"?"Preset":"Presets"?></a>
<a href="help.php"><?=$_SESSION["locale"]=="it"?"Aiuto":"Help"?></a>
<a href="contacts.php"><?=$_SESSION["locale"]=="it"?"Contatti":"Contacts"?></a>
</div>
</div>
<?php include 'cookieBanner.php'; ?>
