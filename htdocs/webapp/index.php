<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");	
header('Content-Type: text/html; charset=utf8');
session_cache_expire(999999);
session_start();

$UploadDirectory='../uploads/';

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die(1);
mysql_select_db($MySql_databasename,$dbconn) or die(1);

$q=mysql_query("select id, title, author from preset order by downloads desc") or die("Error");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
<title>SINE Web App</title>
<style type="text/css">
#presetList{
	margin-top:1em;
}

div.preset{
	display:block;
	padding:1em 0 1em 0;
	border-bottom:1px solid #CCCCCC;
	cursor: pointer;
}
div.preset:focus, div.preset:active, div.preset:hover{
	border-bottom:1px solid #0040FF;
}
div.preset div.presetTitle{
	font-weight:400;
	font-size:1.1em;
}
div.preset div.presetAuthor{
	font-size:0.9em;
	font-style:italic;
	color:#707070;
}


</style>

<script src="sine.js" type="text/javascript"> </script>

</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
	<h1><?php if($_SESSION["locale"]=="it") echo "Preset"; else echo "Presets";?></h1>
	<div id="presetList">
		<?php
			while ($a = mysql_fetch_object ($q)) {
				?>
				<div class="preset" onclick="document.location.href='view.php?id=<?=$a->id?>'">
					<div class="presetTitle"><?=$a->title?></div>
					<div class="presetAuthor"><?=$a->author?></div>
				</div>
				<?php
			}
		?>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	if(!isBrowserSupported()){
		document.location.href='shitBrowser.php';
	}
</script>
</body>
</html>
