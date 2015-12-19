<?php
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");
   header('Content-type: text/xml; charset=utf-8');
   echo '<?xml version="1.0" ?>';
   
$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';
   
   $conn = mysql_connect ($MySql_hostname, $MySql_username, $MySql_password) or die ("1");
   $db = mysql_select_db ($MySql_databasename, $conn) or die ("1");
   $pid=(int)$_GET["id"];
   $qqq=mysql_query("select text from comment where idPreset=".$pid." order by id desc") or die("1");
   echo "<comments>";
   while ($a = mysql_fetch_object ($qqq)) {
	echo "<comment>".htmlspecialchars($a->text)."</comment>";
	}
   echo "</comments>";
?>