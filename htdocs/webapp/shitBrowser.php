<?php
header('Content-Type: text/html; charset=utf8');
session_cache_expire(999999);
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>

<title>SINE Web App - <?php if($_SESSION["locale"]=="it") echo "Errore"; else echo "Error";?></title>

</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
	<h1><?php if($_SESSION["locale"]=="it") echo "Browser non supportato"; else echo "Unsupported browser";?></h1>
	<?php if($_SESSION["locale"]=="it"){?>
		Il tuo browser non supporta lo standard HTML5 Web Audio API, che &egrave; richiesto da questa Web App.<br/>
		Passa ad un browser moderno come <a href="http://www.firefox.com/" target="_blank">Mozilla Firefox</a> o <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a>, oppure <a href="../index.php">scarica SINE per il tuo dispositivo</a>.
	<?php }else{ ?>
		Your browser does not support the HTML5 Web Audio API, which is required by this Web App.<br/>
		Please upgrade to a modern browser such <a href="http://www.firefox.com/" target="_blank">Mozilla Firefox</a> or <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a>,or <a href="../index.php">download SINE for your device</a>.
	<?php } ?>
</div>
</div>
</div>

</body>
</html>
