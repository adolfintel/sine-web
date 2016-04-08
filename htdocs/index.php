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
	position:relative;
	overflow:hidden;
	z-index:999;
}

a.downloadLink{
	display:inline-block;
	font-size:1.2em;
	border: 0.12em solid #FFFFFF;
	border-radius:0.15em;
	padding:0.8em 1em;
	color:#FFFFFF;
	margin:0.5em 0;
	text-decoration:none;
	transition:all 0.2s;
}
a.downloadLink:hover, a.downloadLink:focus, a.downloadLink:active{
	background-color:#FFFFFF;
	color:#000000;
}
a.help{
	color:rgba(255,255,255,0.8);
	font-size:0.9em;
}
.downloadLinks{
	text-align:center;
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
div.separator{
	clear:both;
	height:3em;
}

#trianglesBk{
	position:absolute;
	top:0;
	left:0;
	width:100vw;
	height:100%;
	min-height:100vh;
	z-index:-1;
}
div.content{
	z-index:1;
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

#bigLogo{
	width:50%;
	height:auto;
	display:block;
	margin:0 auto 3em auto;
}

@media all and (max-width: 40em){
	#bigLogo{
		width:60%;
	}
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
<script type="text/javascript" src="muhTriangles.min.js"></script>
</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="stripe" style="background-color:#2a80b9;">
<canvas id="trianglesBk"></canvas>
<div class="content">
	<img id="bigLogo" src="images/logoXLTransp.png" alt="SINE" />
	<div id="winDl" class="downloadLinks" style="display:none">
		<a href="http://downloads.adolfintel.com/geth.php?r=sine-win" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica per Windows":"Download for Windows"?></a>
	</div>
	<div id="androidDl" class="downloadLinks" style="display:none">
		<a href="https://play.google.com/store/apps/details?id=com.dosse.bwentrain.androidPlayer" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica per Android da Google Play":"Download from Google Play"?></a>
	</div>
	<div id="macDl" class="downloadLinks" style="display:none">
		<a href="http://downloads.adolfintel.com/geth.php?r=sine-mac" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica per Mac OS X":"Download for Mac OS X"?></a>
	</div>
	<div id="linuxDl" class="downloadLinks" style="display:none"> <!-- class clear to move it below the picture -->
		<a href="http://downloads.adolfintel.com/geth.php?r=sine-deb" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica .deb per Ubuntu, Debian, etc.":"Download .deb for Ubuntu, Debian, ecc."?></a>
		<a href="https://aur.archlinux.org/packages/sine/" target="_blank" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica for Arch Linux":"Download for Arch Linux"?><sup>AUR</sup></a>
	</div>
	<div id="otherDl" class="downloadLinks">
		<a href="webapp/index.php" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Prova la webapp":"Try the webapp"?></a>
		<a href="http://downloads.adolfintel.com/geth.php?r=sine-pcbin" class="downloadLink"><?=$_SESSION["locale"]=="it"?"Scarica versione portable multipiattaforma":"Download multiplatform portable version"?></a><br/>
		<a href="http://adolfintel.com/?p=sine/index.frag"class="downloadLink"><?=$_SESSION["locale"]=="it"?"Codice sorgente":"Source code"?></a><br/>
		<a href="help.php" class="help"><?=$_SESSION["locale"]=="it"?"Serve aiuto?":"Need help?"?></a>
	</div>
	<div id="showAll" class="downloadLinks">
		<a href="javascript:" onclick="document.getElementById('winDl').style.display='';document.getElementById('androidDl').style.display='';document.getElementById('linuxDl').style.display='';document.getElementById('macDl').style.display='';document.getElementById('otherDl').style.display='';document.getElementById('showAll').style.display='none';" class="help"><?=$_SESSION["locale"]=="it"?"Mostra tutti i download":"Show all downloads"?></a>
	</div>
	<script type="text/javascript">
		function isX86(){
			var p=window.navigator.platform.toLowerCase();
			var plats=["win32","win64","wow64","i386", "i486", "i586", "i686", "x86", "x64", "x86_64", "amd64", "intel"];
			for(var i=0;i<plats.length;i++) if(plats[i].indexOf(p)!=-1) return true;
			return false;
		}
		function isWindows(){
			return navigator.platform.toLowerCase().indexOf("win")!=-1;
		}
		function isLinux(){
			return navigator.platform.toLowerCase().indexOf("linux")!=-1;
		}
		function isMacIntel(){
			return navigator.platform.toLowerCase().indexOf("macintel")!=-1;
		}
		function isAndroid(){
			return navigator.userAgent.toLowerCase().indexOf("android")!=-1;
		}
		if(isWindows()&&isX86()){
			document.getElementById("winDl").style.display="";
			document.getElementById("otherDl").style.display="none";
		}else
		if(isAndroid()){
			document.getElementById("androidDl").style.display="";
			document.getElementById("otherDl").style.display="none";
		}else
		if(isLinux()){
			document.getElementById("linuxDl").style.display="";
			document.getElementById("otherDl").style.display="none";
		}else
		if(isMacIntel()){
			document.getElementById("macDl").style.display="";
			document.getElementById("otherDl").style.display="none";
		}
		
	</script>
<script type="text/javascript">
	new MuhTriangles("trianglesBk",'{"saturation":1,"customHue":208,"lightness":1,"outline":false,"gradientType":"random","gradientIntensity":0.4,"gradientMode":"smooth","gradientInvert":false,"speed":0.8,"instability":1.5,"density":0.6,"responsiveDensity":false,"model":"hexagons","fps":60}');
</script>
</div>
</div>
<div class="content">
<h1><?=$_SESSION["locale"]=="it"?"Funzionalit&agrave;":"Features"?></h1>
<?=$_SESSION["locale"]=="it"?"SINE Isochronic Entrainer &egrave; un'applicazione di Brainwave Entrainment Gratuita e Open Source che genera Toni isocronici.":"SINE Isochronic Entrainer is a Free and Open Source Brainwave Entrainment application that generates Isochronic tones."?>
<br/>
<a href="isochronic.php"><?=$_SESSION["locale"]=="it"?"Scopri di pi&ugrave; su Brainwave Entrainment e Toni isocronici":"Learn more about Isochronic tones and Brainwave Entrainment"?></a>
<div class="separator"></div>
<h3><?=$_SESSION["locale"]=="it"?"Multipiattaforma":"Multiplatform"?></h3>
<div class="OSlogoContainer">
<img src="images/win.png" alt="Windows"/>
<img src="images/linux.png" alt="GNU/Linux" />
<img src="images/mac.png" alt="Mac OS X" />
<img src="images/bsd.png" alt="BSD" />
<img src="images/android.png" alt="Android"/>
<img src="images/web.png" alt="HTML5"/>
</div>
<?=$_SESSION["locale"]=="it"?"SINE &egrave; disponibile su PC (Windows, GNU/Linux, Mac OS X e BSD), Smartphone e Tablet Android, e anche come Web app HTML5.<br/>I Preset funzionano su tutte le piattaforme.":"SINE is available on PC (Windows, GNU/Linux, Mac OS X and BSD), Android Smartphones and Tablets, and even as an HTML5 Web app.<br/>Presets work on all platforms."?>
<div class="separator"></div>
<h3><?=$_SESSION["locale"]=="it"?"Facile da usare":"Easy to use"?></h3>
<img src="images/pcui.png" alt="PC Player UI" class="tinyScreenshot" style="float:right; width:50%" />
<?=$_SESSION["locale"]=="it"?"L'interfaccia &egrave; progettata per essere il pi&ugrave; intuitiva possibile.":"The User Interface is designed to be as intuitive as possible."?>
<div class="separator"></div>
<h3><?=$_SESSION["locale"]=="it"?"Moltissimi Preset":"Tons of Presets"?></h3>
<img src="images/phonepsp.png" alt="Preset Sharing Platform on Android" class="tinyScreenshot" style="float:left; width:25%" />
<?=$_SESSION["locale"]=="it"?"Grazie alla <a href='presets.php'>Piattaforma di condivisione Preset</a>, puoi scaricare, valutare e commentare i Preset di altri utenti e caricare i tuoi.":"Thanks to the <a href='presets.php'>Preset sharing platform</a>, you can download, rate and comment other users' Presets, and upload your own."?>
<div class="separator"></div>
<h3><?=$_SESSION["locale"]=="it"?"Editor integrato":"Built-in editor"?></h3>
<img src="images/pceditor.png" alt="Editor" class="tinyScreenshot" style="float:right; width:40%;" />
<?=$_SESSION["locale"]=="it"?"La versione PC ha un editor, con cui puoi creare i tuoi Preset, completo di manuale e video tutorial.":"The PC version comes with an editor, so you can create your own Presets, complete with manual and video tutorial."?>
<div class="separator"></div>
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
