<div id="header">
<div id="nav">
<?php
//autodetect language if not already set
if(!isset($_SESSION["locale"])){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if($lang=="it") $_SESSION["locale"]="it"; else $_SESSION["locale"]="en";
}
?>
<img src="../images/logoXLTransp.png" alt="Logo" id="logo"/>
<img id="campaign-icon" src="../images/campaign-icon.png" alt="logo" style="display:none"/> <!-- SOCIAL NETWORK CRAP -->
<a href="../index.php"><?=$_SESSION["locale"]=="it"?"Scarica l'app":"Download app"?></a>
</div>
</div>
<?php include '../cookieBanner.php'; ?>
