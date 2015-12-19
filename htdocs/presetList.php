<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");	

$UploadDirectory='uploads/';

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die(1);
mysql_select_db($MySql_databasename,$dbconn) or die(1);

$q="select * from preset order by downloads desc";
if(isset($_GET["id"])) $q="select * from preset where id=".(int)($_GET["id"]);
$query=mysql_query($q) or die(1);

header('Content-type: text/xml; charset=utf-8');
echo '<?xml version="1.0" ?>';
?>
<PresetList>
	<?php while ($a = mysql_fetch_object ($query)) { ?>
		<Preset id="<?=$a->id?>">
			<title><?=$a->title?></title>
			<author><?=$a->author?></author>
			<?php if(isset($_GET["full"])){ ?>
				<description><?=$a->description?></description>
				<url><?=$UploadDirectory.$a->fileName?></url>
				<downloads><?=$a->downloads?></downloads>
				<likes><?=$a->likes?></likes>
				<dislikes><?=$a->dislikes?></dislikes>
				<date><?=$a->uploadDate?></date>
			<?php } ?>
		</Preset>
	<?php } ?>
</PresetList>

