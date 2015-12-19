<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die('1');
mysql_select_db($MySql_databasename,$dbconn);

$q = mysql_query ("update preset set downloads=downloads+1 WHERE id=".((int)$_GET["id"])) or die ('1');
echo '0';

?>