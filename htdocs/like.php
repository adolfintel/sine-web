<?php
session_cache_expire(999999);
session_start();
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");	
	$usevw=isset($_GET["ieshit"]);
   ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Like/Dislike buttons iframe</title>
<style>
body{
margin:0;
padding:0;
font-family:'Open Sans';
<?php if($usevw){ ?> font-size:4vw; <?php } else {?> font-size:16px; <?php } ?>
color:#FFFFFF;
background:transparent;
}
img{
border:none;
outline:none;
vertical-align:middle;
<?php if($usevw){ ?> height:5vw; width:auto; <?php } ?>
}
a.button{
display:inline-block;
margin:0.15em;
padding:0.2em;
color:#FFFFFF;
text-decoration:none;
min-width:4em;
}
a.selected{
margin:0;
border:0.15em solid #BBBBBB;
}
a.like{
background-color:#20C020;
}
a.dislike{
background-color:#C02020;
}
</style>
</head>
<body>
<?php
$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$conn = mysql_connect ($MySql_hostname, $MySql_username, $MySql_password) or die (mysql_error ());
$db = mysql_select_db ($MySql_databasename, $conn) or die (mysql_error ());

$action=$_GET["action"];
$id=(int)$_GET["id"];

$v="voted".$id;
if(isset($_GET["action"])){
	if($action=="l"){
		if(isset($_SESSION[$v])){
			if($_SESSION[$v]=="l"){ //remove previous like
				$qqq = mysql_query ("UPDATE preset SET likes=likes-1 WHERE id=".$id) or die (mysql_error ());
				unset($_SESSION[$v]);
			}else if($_SESSION[$v]=="d"){ //remove previous dislike and add like
				$qqq = mysql_query ("UPDATE preset SET dislikes=dislikes-1, likes=likes+1 WHERE id=".$id) or die (mysql_error ());
				$_SESSION[$v]="l";
			}
		}else{	//add like
			$qqq = mysql_query ("UPDATE preset SET likes=likes+1 WHERE id=".$id) or die (mysql_error ());
			$_SESSION[$v]="l";
		}
	}else if($action=="d"){
		if(isset($_SESSION[$v])){
			if($_SESSION[$v]=="d"){ //remove previous dislike
				$qqq = mysql_query ("UPDATE preset SET dislikes=dislikes-1 WHERE id=".$id) or die (mysql_error ());
				unset($_SESSION[$v]);
			}else if($_SESSION[$v]=="l"){ //remove previous like and add dislike
				$qqq = mysql_query ("UPDATE preset SET likes=likes-1, dislikes=dislikes+1 WHERE id=".$id) or die (mysql_error ());
				$_SESSION[$v]="d";
			}
		}else{	//add dislike
			$qqq = mysql_query ("UPDATE preset SET dislikes=dislikes+1 WHERE id=".$id) or die (mysql_error ());
			$_SESSION[$v]="d";
		}
	}
}
$qqq=mysql_query("SELECT * FROM preset WHERE id=".$id) or die (mysql_error());
$q=mysql_fetch_object($qqq);
?>
<a class='button like <?php if(isset($_SESSION[$v])) if($_SESSION[$v]=="l") echo "selected";?>' href='like.php?action=l<?php if($usevw){ ?>&ieshit=1<?php } ?>&id=<?=$q->id?>'><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwABEI8AARCPAbZ2bGgAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAATRJREFUSEvtlCFLQ1EYhi+GhYnRGQwGHZiGVUwLgmlGRVDxD1iEmQaWpbG4YDOJP0GGv8Ag/gGDyWbToMzr8537yrwed+HunGDwgYfBec95v3DPTlKGNE37eI8rWooHpRV8RuNKy/Gg9CDrdgy1HAcKZ/HRVWecKYoDhYOs1/GOS4rCoWzH1Y65VBQOZev44mrH7CsOg6I1/Lo137GrajdqETdwD0+wg5s6Xgwbq/iAk/jQ709sfVk1k2FT120vzxvOq8aHsI4XOMJpeMVj1fkQtty2cBZUmYcgxoAbnFFlHoIYA9qq8yGMMcC+35wq8xDEGHCuOh/C0AFPWFGdD+Eq9vAa7U6Xxf5oddUVw8YanuIt2gtahBXf4baOl4OD9nQ0cAvtdT3EI9zFJv5+7//5AyTJJwa3srYCvHoKAAAAAElFTkSuQmCC" alt="Like"/><?=$q->likes?></a>
<a class='button dislike <?php if(isset($_SESSION[$v])) if($_SESSION[$v]=="d") echo "selected";?>' href='like.php?action=d<?php if($usevw){ ?>&ieshit=1<?php } ?>&id=<?=$q->id?>'><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwABEI8AARCPAbZ2bGgAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAATRJREFUSEvtlC9LQ2EUhy+GBcWohgWDG5iGdZgMA5NGZaDDL7Ay2NJgZUmMBtvS8COI+AkM4hdYMNlsGpTt+py7n7Dt3jv35xTBB57ynnN+By7ve4N//gZhGK5iAQ/xBCt4gad4gFtqnR2GNrGBj/iF0xjgEx5rPBkadvES7/AT58UW5RUXh+JR1LY4r5hRXByKyy4wbhQXh6LHgj6uK3IcCh4L6oqLQ9FjwQOuKHIcCh4LjOR3QSGPHbTvuAgfWFVcOjS1o/b5sbezoZh0aLJfQ88mUrAHlYSd7yhmOjTu4ZtNTXCFGcziPpaxhk0saXw2GCjiO45yprIPBNrfc5SuSn4Qej3MjrA/67ZKPhC4hi+WLloq+UHo+TA74l7HfhBqN+fnVt3q2BeC7Yo+Y05HvxAE3+VpsrZKF6GLAAAAAElFTkSuQmCC" alt="Dislike"/><?=$q->dislikes?></a>
<?php
?>
</body>
</html>