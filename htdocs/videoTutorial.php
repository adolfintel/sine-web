<?php
	session_cache_expire(999999);
	session_start();
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html; charset=utf-8');

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die('1');
mysql_select_db($MySql_databasename,$dbconn);

$q = mysql_query ("update videoView set count=count+1 WHERE id=".($_SESSION["locale"]=="it"?"2":"1")) or die("Server error, please try again later");
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
<h1>Tutorial</h1>
<video controls="controls" style="width:100%; max-width:1024px; height:auto;">
<source src="videoTutorial/sine_editor_tut_<?=$_SESSION["locale"]=="it"?"it":"en"?>.webm" type="video/webm"/>
<source src="videoTutorial/sine_editor_tut_<?=$_SESSION["locale"]=="it"?"it":"en"?>.m4v" type="video/mp4" />
<?php if($_SESSION["locale"]=="it") echo "Il tuo browser non supporta nessun formato video HTML5 standard. Per vedere il tutorial devi aggiornarlo: consiglio <a href='http://www.firefox.com'>Mozilla Firefox</a>."; else echo "Your browser does not support any standard HTML5 video format. To see this tutorial, you must upgrade it: I recommend <a href='http://www.firefox.com'>Mozilla Firefox</a>.";?>
</video>
<br/>
<a href="http://www.electroherbalism.com/Bioelectronics/FrequenciesandAnecdotes/BrainwaveFrequencyList.htm"><?=$_SESSION["locale"]=="it"?"Link al sito nominato nel video":"Link to the site mentioned in the video" ?></a>
<br/><br/>
<?php if($_SESSION["locale"]=="en") echo "<span style='font-size:0.75em'>I apologize for the pauses in the English version of the tutorial. It was redubbed from the Italian version, and English is much more concise.</span>";
?>
</div>
<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
