<?php
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");
   
$UploadDirectory='uploads/';

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$FileTitle=str_replace("&","",filter_var($_FILES['mFile']['name'], FILTER_SANITIZE_STRING));

$Timestamp=microtime(true);
$date=date("Y-m-d H:i:s");
$NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($Timestamp.'-'.$FileTitle));

$xml = simplexml_load_file($_FILES['mFile']["tmp_name"]);
$infos=$xml->PresetInfos;
if(count($infos)!=1) die('2');
$title="";
$author="";
$description="";
foreach($infos as $info){
	$title=$info->Title;
	$author=$info->Author;
	$description=$info->Description;
}
if(trim($title)==false) die("3");
if(trim($author)==false) die("4");
if(trim($description)==false) die("5");
if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName )){		
	$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die('1');
	mysql_select_db($MySql_databasename,$dbconn);
	mysql_query("insert into preset(title,author,description,fileName,uploadDate) values ('".mysql_real_escape_string(strip_tags($title))."','".mysql_real_escape_string(strip_tags($author))."','".mysql_real_escape_string(strip_tags($description))."','".$NewFileName."','".$date."')") or die('1');
	mysql_close($dbconn);
	echo '0';
}else{
	die('1');
}
   
?>