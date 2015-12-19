<?php
	header('Content-Type: text/html; charset=utf-8');
	session_cache_expire(999999);
	session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
<style type="text/css">
div.stripe{
	display:block;
	width:100%;
	margin:1em 0 1em 0;
	padding:1.5em 0 1.5em 0;
	clear:both;
	color:#FFFFFF;
	box-shadow: 0 -2em 2em -2em rgba(0,0,0,0.3) inset, 0 1em 1em -1em rgba(0,0,0,0.2) inset;
}

a.downloadLink{
	color:rgba(255,255,255,0.8);
	font-size:1.1em;
	text-decoration:underline;
	margin-bottom:0.7em;
}
a.downloadLink:hover, a.downloadLink:focus, a.downloadLink:active{
	color:rgba(255,255,255,1);
}
img.dlpic{
	margin:0.7em;
	height:13em;
	width:auto;
}
h3{
	margin-top:0.5em;
	font-weight:300;
}
div.stripe h3{
	margin-top:0;
	margin-bottom:0.5em;
	font-size:2.5em;
	font-weight:300;
	clear:none;
}

img.tinyScreenshot{
	margin:0.5em;
	width:auto;
	height:auto;
}
div.OSlogoContainer{
	float:right;
	text-align:center;
	margin-left:0.7em;
}
@media all and (max-width: 40em){
	img.tinyScreenshot, img.dlpic{
		display:block;
		width:100% !important;
		height:auto !important;
		margin:0;
		float:none !important;
	}
	div.OSlogoContainer{
		float:none;
		display:block;
		margin:0;
	}
}
</style>
</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="stripe" style="background-color:#d55401;">
<div class="content">
<img src="images/laptop.png" alt="PC" class="dlpic" style="float:left;" />
<h3><?=$_SESSION["locale"]=="it"?"Per il tuo PC":"For your PC"?></h3>
<?=$_SESSION["locale"]=="it"?"SINE &egrave; compatibile con Windows, GNU/Linux, Mac OS X, e BSD.<br/>Questa versione include anche un editor semplice da usare per creare i tuoi Preset e condividerli col mondo.":"SINE is compatible with Windows, GNU/Linux, Mac OS X, and BSD.<br/>This version even includes an easy to use editor to make your own Presets to share with the world."?>
<br/><br/>
<a id="winDl" href="http://downloads.adolfintel.com/geth.php?r=sine-win" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica per Windows":"Download for Windows"?></a><br/>
<script type="text/javascript">
	function isX86(){
		var p=window.navigator.platform.toLowerCase();
		var x86=false;
		["win32","win64","wow64","i386", "i486", "i586", "i686", "x86", "x64", "x86_64", "amd64", "intel"].forEach(function(x){if(p.indexOf(x)!=-1){x86=true;}});
		return x86;
	}
	if(navigator.platform.toLowerCase().indexOf("win")==-1||!isX86()) document.getElementById("winDl").style.display="none";
</script>
<a href="http://downloads.adolfintel.com/geth.php?r=sine-pcbin" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica versione portable multipiattaforma":"Download multiplatform portable version"?></a>
<a href="help.php" class="downloadLink" style="font-size:0.8em"><?=$_SESSION["locale"]=="it"?"Serve aiuto?":"Need help?"?></a>
<div class="clear"></div>
</div>
</div>
<div class="stripe" style="background-color:#2a80b9;">
<div class="content">
<img src="images/tablet.png" alt="Android" class="dlpic" style="float:right;" />
<h3><?=$_SESSION["locale"]=="it"?"Per il tuo Android":"For your Android"?></h3>
<?=$_SESSION["locale"]=="it"?"SINE &egrave; compatibile con Smartphone e Tablet Android":"SINE is compatible with Windows, GNU/Linux, Mac OS X, and BSD."?>
<br/><br/>
<a href="https://play.google.com/store/apps/details?id=com.dosse.bwentrain.androidPlayer" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica da Google Play":"Download from Google Play"?></a>
<div class="clear"></div>
</div>
</div>
<div class="stripe" style="background-color:#565e57;">
<div class="content">
<img src="images/webapp.png" alt="Web app" class="dlpic" style="float:left;" />
<h3><?=$_SESSION["locale"]=="it"?"Sul web":"On the web"?></h3>
<?=$_SESSION["locale"]=="it"?"Se utilizzi un browser moderno, puoi usare SINE direttamente dal web, senza bisogno di scaricare nulla!":"If you're using a modern browser, you can use SINE directly from the web, no need to download anything!"?>
<br/><br/>
<a href="webapp/index.php" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Prova la Web app":"Try the Web app"?></a>
<div class="clear"></div>
</div>
</div>
<div class="content">
<h1><?=$_SESSION["locale"]=="it"?"Funzionalit&agrave;":"Features"?></h1>
<?=$_SESSION["locale"]=="it"?"SINE Isochronic Entrainer &egrave; un'applicazione di Brainwave Entrainment Gratuita e Open Source che genera Toni isocronici.":"SINE Isochronic Entrainer is a Free and Open Source Brainwave Entrainment application that generates Isochronic tones."?>
<br/>
<a href="isochronic.php"><?=$_SESSION["locale"]=="it"?"Scopri di pi&ugrave; su Brainwave Entrainment e Toni isocronici":"Learn more about Isochronic tones and Brainwave Entrainment"?></a>
<h3><?=$_SESSION["locale"]=="it"?"Multipiattaforma":"Multiplatform"?></h3>
<div class="OSlogoContainer">
<img src="images/win.png" alt="Windows"/>
<img src="images/linux.png" alt="GNU/Linux" />
<img src="images/mac.png" alt="Mac OS X" />
<img src="images/bsd.png" alt="BSD" />
<img src="images/android.png" alt="Android"/>
<img src="images/web.png" alt="HTML5"/>
</div>
<?=$_SESSION["locale"]=="it"?"SINE &egrave; disponibile su PC (Windows, GNU/Linux, Mac OS X e BSD), Smartphone e Tablet Android, e anche come Web app HTML5.<br/>Tutti i Preset funzionano su entrambe le piattaforme.":"SINE is available on PC (Windows, GNU/Linux, Mac OS X and BSD), Android Smartphones and Tablets, and even as an HTML5 Web app.<br/>All presets work on all platforms."?>
<h3><?=$_SESSION["locale"]=="it"?"Facile da usare":"Easy to use"?></h3>
<img src="images/pcui.png" alt="PC Player UI" class="tinyScreenshot" style="float:right; width:50%" />
<?=$_SESSION["locale"]=="it"?"L'interfaccia &egrave; progettata per essere il pi&ugrave; intuitiva possibile.":"The User Interface is designed to be as intuitive as possible."?>
<h3><?=$_SESSION["locale"]=="it"?"Moltissimi Preset":"Tons of Presets"?></h3>
<img src="images/phonepsp.png" alt="Preset Sharing Platform on Android" class="tinyScreenshot" style="float:left; width:25%" />
<?=$_SESSION["locale"]=="it"?"Grazie alla <a href='presets.php'>Piattaforma di condivisione Preset</a>, puoi scaricare, valutare e commentare i Preset di altri utenti e caricare i tuoi.":"Thanks to the <a href='presets.php'>Preset sharing platform</a>, you can download, rate and comment other users' Presets, and upload your own."?>
<h3><?=$_SESSION["locale"]=="it"?"Editor integrato":"Built-in editor"?></h3>
<img src="images/pceditor.png" alt="Editor" class="tinyScreenshot" style="float:right; width:40%;" />
<?=$_SESSION["locale"]=="it"?"La versione PC ha un editor, con cui puoi creare i tuoi Preset, completo di manuale e video tutorial.":"The PC version comes with an editor, so you can create your own Presets, complete with manual and video tutorial."?>
<h3><?=$_SESSION["locale"]=="it"?"Software Libero":"Free Software"?></h3>
<img src="images/gnu.png" alt="Free Software" style="float:left; margin:1em;" />
<?=$_SESSION["locale"]=="it"?"SINE non &egrave; solo gratuito: &egrave; Software Libero, distribuito su licenza <a href='http://www.gnu.org/copyleft/gpl.html'>GNU GPLv3</a>.":"SINE isn't just free: it's Free Software, distributed under the <a href='http://www.gnu.org/copyleft/gpl.html'>GNU GPLv3 License</a>."?>
<br/>
<?=$_SESSION["locale"]=="it"?"Sei legalmente libero di usare questo software per qualsiasi scopo, di studiarlo, modificarlo per adattarlo alle tue necessit&agrave;, ridistribuirlo, e anche distribuire versioni modificate.":"You are legally free to use this software for any purpose, study it, modify it to fit your needs, redistribute it, and even redistribute your modified versions."?>
<br/>
<a href="https://www.gnu.org/philosophy/free-sw.html"><?=$_SESSION["locale"]=="it"?"Scopri di pi&ugrave; sul Software Libero":"Learn more about Free Software"?></a><br/>
<a href="http://adolfintel.com/?p=sine/index.frag"><?=$_SESSION["locale"]=="it"?"Pagina del progetto":"Project page"?></a><br/>
</div>
<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
