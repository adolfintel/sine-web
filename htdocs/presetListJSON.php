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

header('Content-type: text/json charset=utf-8');

$ret=array();
while ($a = mysql_fetch_object ($query)) { 
	$x=array();
	$x["id"]=$a->id;
	$x["title"]=$a->title;
	$x["author"]=$a->author;
	if(isset($_GET["full"])){
		$x["description"]=$a->description;
		$x["url"]=$UploadDirectory.$a->fileName;
		$x["downloads"]=$a->downloads;
		$x["likes"]=$a->likes;
		$x["dislikes"]=$a->dislikes;
		$x["date"]=$a->uploadDate;
	}
	$ret[]=$x;
}
echo json_encode($ret);
?>


