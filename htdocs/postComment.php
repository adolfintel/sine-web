<?php
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");
   
$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';
   
   $conn = mysql_connect ($MySql_hostname, $MySql_username, $MySql_password) or die ("1");
   $db = mysql_select_db ($MySql_databasename, $conn) or die ("1");
   $pid=(int)$_POST["id"];
   $text=nl2br(strip_tags(mysql_real_escape_string($_POST["text"])),true);
   $qqq=mysql_query("insert into comment(text,idPreset) values ('".$text."',".$pid.")") or die("1");
   echo "0";
?>
