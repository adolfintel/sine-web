<?php
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");
   
$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';
   
   $conn = mysql_connect ($MySql_hostname, $MySql_username, $MySql_password) or die (mysql_error ());
   $db = mysql_select_db ($MySql_databasename, $conn) or die (mysql_error ());
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<?php
	   $q = mysql_query ("SELECT * FROM preset WHERE id = ".((int)$_GET["id"]));
	   $a = mysql_fetch_object ($q);
	   
	?>
	<title><?=$a->title?></title>
	<meta name="DESCRIPTION" content="<?=$a->description;?>">
</head>
<body>
	<script type="text/javascript">
		//<![CDATA[
		location.href="presets.php?id=<?=(int)$_GET["id"]?>";
		//]]>
	</script>
	<img id="campaign-icon" src="images/campaign-icon.png" alt="logo"/>
</body>
</html>