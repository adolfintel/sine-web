<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(999999);
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
<h1><?=$_SESSION["locale"]=="it"?"Domande frequenti":"Here's a list of FAQs"?></h1>
<h3><?=$_SESSION["locale"]=="it"?"Installare SINE (Windows)":"Installing SINE (Windows)"?></h3>
<?=$_SESSION["locale"]=="it"?"Installare SINE su Windows &egrave; molto semlpice: scarica l'installer, eseguilo e segui le istruzioni a schermo. Al termine, potrai avviarlo dal men&ugrave; Start o dalle icone sul Desktop.":"Installing SINE on Windows is very easy: just download the installer, run it and follow the on-screen instructions. Once installed, you can run SINE from the Start menu or from the icons placed on the Desktop."?>
<h3><?=$_SESSION["locale"]=="it"?"Installare SINE (Android)":"Installing SINE (Android)"?></h3>
<?=$_SESSION["locale"]=="it"?"SINE per Android &egrave; attualmente disponibile solo su Google Play. Per installarlo sul tuo dispositivo, apri il Play Store e cerca ":"SINE for Android is currently available only on Google Play. To install it on your Android device, open the Play Store and search "?>"SINE Isochronic Entrainer".
<h3><?=$_SESSION["locale"]=="it"?"Installare SINE (Pacchetto .deb)":"Installing SINE (.deb package)"?></h3>
<?=$_SESSION["locale"]=="it"?"Il pacchetto .deb è pensato per Ubuntu, Debian e distro derivate. Non tentare di convertirlo utilizzando alien.":"The .deb package is for use with Ubuntu, Debian and similar distros. Do not try to convert it using alien."?><br/>
<?=$_SESSION["locale"]=="it"?"Per installarlo, dovrebbe bastare fare avviare sul file scaricato e seguire le istruzioni.":"To install the package, simply run it and follow the instructions."?><br/>
<?=$_SESSION["locale"]=="it"?"Qualora non si riesca ad installarlo automaticamente, può essere installato dal terminale, navigando nella cartella dei download ed eseguendo dpkg -i sine.deb":"If the automatic install doesn't work, you can install it manually: open a terminal, navigate to the downloads directory and run dpkg -i sine.deb"?><br/>
<h3><?=$_SESSION["locale"]=="it"?"Installare SINE (Arch AUR)":"Installing SINE (Arch AUR)"?></h3>
<?=$_SESSION["locale"]=="it"?"SINE è disponibile tramite AUR. Per installare software da AUR, è necessario un":"SINE is available on AUR. To install software from AUR you'll need an "?><a href="https://wiki.archlinux.org/index.php/AUR_helpers" target="_blank">AUR helper</a>.<br/>
<?=$_SESSION["locale"]=="it"?"Una volta installato l'AUR helper, utilizzalo per installare automaticamente il pacchetto sine.":"Once you've installed the AUR helper, use it to install the sine package automatically"?><br/>
<h3><?=$_SESSION["locale"]=="it"?"Installare SINE (Pacchetto multipiattaforma)":"Installing SINE (Multiplatform package)"?></h3>
<?=$_SESSION["locale"]=="it"?"SINE funziona su tutte le piattaforme supportate da Java.":"SINE runs on all platforms supported by Java."?><br/>
<?=$_SESSION["locale"]=="it"?"Anzitutto, <a href='http://java.com/download'>scarica Java</a> (se non &egrave; gi&agrave; installato), poi apri ed estrai l'archivio scaricato, ed esegui SINE.jar o SINE-Editor.jar.":"First, <a href='http://java.com/download'>download Java</a> (if not already installed), then open the downloaded archive and extract it somewhere, and run SINE.jar or SINE-Editor.jar."?><br/>
<?=$_SESSION["locale"]=="it"?"Se non riesci ad aprire l'archivio, hai bisogno di un gestore di archivi, come ad esempio <a href='http://www.kekaosx.com'>Keka (Mac)</a>.":"If you can't open the archive, you need an archive manager, like <a href='http://www.kekaosx.com'>Keka (Mac)</a>."?><br/>
<br/>
<?=$_SESSION["locale"]=="it"?"Istruzioni dettagliate per installare Java ed estrarre archivi .7z sulla tua piattaforma possono essere trovate facilmente online":"Detailed instructions for installing Java and extracting .7z archives on your specific platform can easily be found online"?>.
<h3><?=$_SESSION["locale"]=="it"?"Dove posso trovare dei Preset?":"Where can I get some Presets?"?></h3>
<?=$_SESSION["locale"]=="it"?"Su questo sito c'&egrave; una ":"On this site there's a "?> <a href='presets.php'><?=$_SESSION["locale"]=="it"?"collezione di Preset ":"nice collection of Presets"?></a>.
<h3><?=$_SESSION["locale"]=="it"?"Cos'&egrave; quel rumore che si sente nei Preset?":"What's that static in all those Preset?"?></h3>
<?=$_SESSION["locale"]=="it"?"Il rumore di sottofondo &egrave; necessario affinch&egrave; il tuo cervello non si adatti alle pulsazioni; se viene rimosso, dopo alcuni minuti smetterai di sentirle":"Background noise is needed in order for Isochronic tones to work; without noise, your brain adapts to the pulses and you'd stop hearing them after a few minutes"?>.
<h3><?=$_SESSION["locale"]=="it"?"Voglio creare un Preset ma non riesco a usare l'editor":"I want to make a Preset but don't know how to use the editor"?></h3>
<?=$_SESSION["locale"]=="it"?"Nell'editor c'&egrave; un manuale e un video tutorial: fai click sul punto di domanda nella barra dei menu e segui le istruzioni.<br/>Ricordati di condividerlo!":"The editor comes with a manual and a video tutorial: click on the question mark on the menu bar and follow the instructions.<br/>Don't forget to share your work!"?>
.<br/>
<h3><?=$_SESSION["locale"]=="it"?"Sotto quale licenza sono distribuiti i Preset?":"What license are Presets distributed under?"?></h3>
<?=$_SESSION["locale"]=="it"?"Se non specificato diversamente, i Preset sono distribuiti su licenza <a href='https://creativecommons.org/licenses/by/3.0/'>Creative Commons Attribution 3.0 Unported</a>":"Unless otherwise specified, Presets are distributed under the <a href='https://creativecommons.org/licenses/by/3.0/'>Creative Commons Attribution 3.0 Unported License</a>"?>.
<h3><?=$_SESSION["locale"]=="it"?"Qualcuno ha violato il mio copyright":"Someone violated my copyright"?></h3>
<?=$_SESSION["locale"]=="it"?"<a href='contacts.php'>Contattaci</a> e inviaci le prove della violazione, e rimuoveremo il Preset immediatamente":"Please <a href='contacts.php'>contact us</a> and provide evidence of the violation, and we'll remove the Preset immediately"?>.
<h1><?=$_SESSION["locale"]=="it"?"Altre domande":"Other questions"?>?</h1>
<?=$_SESSION["locale"]=="it"?"<a href='contacts.php'>Contattaci</a> o usa una delle nostre pagine sui social network, e risponderemo appena possibile":"<a href='contacts.php'>Contact us</a> use one of our social network pages, and we'll reply ASAP"?>.
</div>
<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
