<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");	
header('Content-Type: text/html; charset=utf8');

if(!isset($_GET["id"])){
	//no preset specified, redirect to list
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: index.php"); 
}
session_cache_expire(999999);
session_start();

$UploadDirectory='../uploads/';

$MySql_username="USERNAME";
$MySql_password="PASSWORD";
$MySql_hostname="HOSTNAME";
$MySql_databasename='DATABASE';

$dbconn = mysql_connect($MySql_hostname, $MySql_username, $MySql_password)or die("Error");
mysql_select_db($MySql_databasename,$dbconn) or die("Error");

//todo: checks and redirect if invalid id
$id=(int)($_GET["id"]);
$q=mysql_query("select * from preset where id=".$id) or die("Error");
$a=mysql_fetch_object($q);
if(!$a){
	//preset does not exist, back to list
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: index.php"); 
}
mysql_query("update preset set downloads=downloads+1 where id=".$id);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
<title><?=$a->title?></title>
<style type="text/css">

h1.presetTitle{
	display:inline-block;
	vertical-align:middle;
	text-align:justify;
}
div.presetAuthor{
	font-weight:300;
	font-style:italic;
	color:#707070;
	font-size:0.9em;
	margin:0;
	padding:0;
}
div.presetDescription{
	text-align:justify;
	margin-top:1em;
}
img.back{
	height:2.5em;
	width:auto;
	margin-right:0.8em;
	vertical-align:middle;
}
iframe{
	border:none;
	margin:0;
	padding:0;
	overflow:hidden;
}
iframe.player{
	display:block;
	width:100%;
	margin:1em 0 1.5em 0;
}
div.viewCounter{
	display:inline-block;
	font-size:1.4em;
	font-weight:700;
	float:right;
	vertical-align:bottom;
}
div.likes{
	display:inline-block;
	float:left;
}

div.comments{
	margin-top:1em;
}
div.comments input, div.comments textarea{
	background-color:#EEEEEE;
}
div.comments input:focus, div.comments input:active, div.comments textarea:focus, div.comments textarea:active{
	background-color:#FFFFFF;
}
div.comments input[type="button"]{
	display:block;
	min-width:8em;
	margin:0.5em 0 0 auto;
}
div.comments > div.commentsArea{
	margin-top:0.2em;
}
div.comments > div.commentsArea > div.comment{
	border-bottom:1px solid #CCCCCC;
	font-size:0.8em;
	padding:1em 0 1em 0;
}
@media all and (max-width: 60em){
	div.content{
		max-width:95vw;
	}
}
@media all and (max-width: 30em){
	div.content{
		font-size:0.75em;
	}
}
</style>

<script type="text/javascript">
String.prototype.isBlank=function(){
	return !this || /^\s*$/.test(this);
}

<?php
if($_SESSION["locale"]=="it"){
?>
var COMMENT_PLACEHOLDER="Scrivi il tuo commento",
	COMMENT_POST="Invia",
	COMMENT_EMPTY="Il commento è vuoto",
	COMMENT_UPLOAD_FAIL="Caricamento del commento fallito, riprova più tardi.",
	COMMENT_LOAD_FAIL="Impossibile caricare i commenti",
	UNKNOWN_ERROR="Errore sconosciuto";
<?php
}else{
?>
var COMMENT_PLACEHOLDER="Type your comment here",
	COMMENT_POST="Post",
	COMMENT_EMPTY="The comment is empty",
	COMMENT_UPLOAD_FAIL="Failed to post comment. Please try again later",
	COMMENT_LOAD_FAIL="Couldn't load comments",
	UNKNOWN_ERROR="Unknown error";
<?php
}
?>

	function showLoading(container){
		var l=document.createElement("img");
		l.className="loading";
		l.src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAB3RJTUUH3gQVCzkNCsfIdAAAAwpJREFUWMO9lzuLFFEQhb/u6R622ufSuy7IGqwoCoosCIJGK6hgJiZiIiYGBiKY+Av0B4ihDxCMRAwUBBMTHxgospjoirKKL7DB13bNaPeMSfVwGcZxnLan4MLQ3XPPqVN1b1V5DGgishrYB8wBs8AMUAOOq+p1hjRvAOCNwEngILAC8LvWfVWdG5ZA0Ac4Ak4Dx4AxA2t3fdYGblPCgj+ArwcuAFsc4DagwF3gIfAceAUslCHg9QDfBlwBJh2ZE+A8cFVVvw4LlqYpURT1jfeMiDwWkUUReSsi70TknIiMU9LSNEVEvDRNeytgMb8GbDavAc4AF1W1XRY8jmO/wEuSJC+UcHPgBLABaFm8zyZJcqmvZANaHMeegXuAF8cxQE7hqYjMAIcNvAVcBy7/D3DzuFCwyKlQRDwcqY/apZIDn4CzZWV3LYoikiTJTYEOCQBfRFYCew08By6UyfR+JGz/IhfqIuIFwE6gbi+bwA2qM1cFgMAHtjveP1DV71WhW1hbbhgCy/zcvnlC9dZywhAGwBogswevR0SgZr/DABBHgS8jINB2CBCY977zsmrzHAJtH/jmJOGKERCo2fIBzwfemwoZMD0CAnWHRMsHXpr3mRWiqi1yCGQ+8NQhsNWqYiUmIjULc0Gg4dvZXzISNWs6q7JxqwE1S8bUV9Ul4J6jwn4RWVaB9wEw5STgD1XNi+N3E2gYieXAoaJc/g+zLmidNbcFgc+dcqyq74E7jgo7gN3d7VOJbmit3bidHlNVm24/gFXBRSPRAg7EcTxXRgkDnwbWO4nXBD707IpFZAo4ZUeluJweAbdUNf3HmIfAJvO8cKoJzKtqw72VOpZl2VIYhi+ArXZNtyxxZsMwzMMw/JxlWfY34DAMZ2x8W+U4+gt41u2I94dNJoEjNhvkTm40bBB5Y7OCWv2o2/mesNV2/pPbdT/fS0Wvjyd1YI8lJM6Gg6zi219W4hdUNR92OJ0AdjnzQjdIL+CmqbSgqj9KTccOkTHL5mmTOXI66RT4amf7I/BBVX8Osu9vSZob3/WKrPUAAAAASUVORK5CYII=";
		container.innerHTML="";
		container.appendChild(l);
	}

	function createCommentsForm(id,container){
		var f=document.createElement("form");
		var t=document.createElement("textarea");
		t.name="text";
		t.rows=4;
		t.setAttribute("placeholder",COMMENT_PLACEHOLDER);
		f.appendChild(t);
		var b=document.createElement("input");
		b.type="button";
		b.value=COMMENT_POST;
		f.appendChild(b);
		container.appendChild(f);
		var c=document.createElement("div");
		c.className="commentsArea";
		container.appendChild(c);
		b.onclick=function(){sendComment(id,t,c);};
		loadComments(id,c);
	}
	function loadComments(id,container){
		showLoading(container);
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4){
				if(xhr.status==200){
					try{
						if(parseInt(xhr.responseText)==1){container.innerHTML=COMMENT_LOAD_FAIL; return;}
					}catch(e){}
					try{
						container.innerHTML="";
						var comments=xhr.responseXML.documentElement.getElementsByTagName("comment");
						for(var i=0;i<comments.length;i++){
							var c=document.createElement("div");
							c.className="comment";
							c.innerHTML=comments[i].firstChild.nodeValue;
							container.appendChild(c);
						}
					}catch(e){
						container.innerHTML=COMMENT_LOAD_FAIL;
					}
				}
			}
		}
		xhr.open("GET","../getComments.php?id="+id+"&r="+Math.random(),true);
		xhr.send();
	}
	function sendComment(id,t,commentsArea){
		if(t.value.isBlank()){ alert(COMMENT_EMPTY); return;}
		var text=t.value;
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4){
				if(xhr.status==200){
					try{
						if(parseInt(xhr.responseText)==1){alert(COMMENT_UPLOAD_FAIL); return;}
					}catch(e){alert(COMMENT_UPLOAD_FAIL); return;}
					t.value="";
					loadComments(id,commentsArea);
				}
			}
		}
		var params="";
		params+="id="+encodeURIComponent(id)+"&text="+encodeURIComponent(text)+"&r="+Math.random();
		xhr.open("POST","../postComment.php",false);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.setRequestHeader("Content-length", params.length);
		xhr.setRequestHeader("Connection", "close");
		xhr.send(params);
	}
	
	
</script>

<script src="sine.js" type="text/javascript"> </script>

</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
	<a href="index.php"><img src="back.png" class="back" alt="Back"/></a>
	<h1 class="presetTitle"><?=$a->title?></h1>
	<div class="presetAuthor"><?=$a->author?></div>
	<div class="presetDescription"><?=$a->description?></div>
	<iframe id="player" src="player.html?preset=<?=$UploadDirectory.$a->fileName?>" class="player" frameborder="0" scrolling="no"></iframe>
	<div class="likes">
		<iframe id="likes" src="../like.php?id=<?=$id?>" frameborder="0" scrolling="no"  style="width:12em; height: 3em;"></iframe>
	</div>
	<div class="viewCounter">
		<?php if($_SESSION["locale"]=="it") echo $a->downloads." visualizzazioni"; else echo $a->downloads." views";?>
	</div>
	<div class="clear"></div>
	<div class="comments" id="comments">
	</div>
	<script type="text/javascript">
			createCommentsForm(<?=$id?>,document.getElementById("comments"));
	</script>
</div>
</div>
</div>
<script type="text/javascript">
	setInterval(function(){
		//fix iframe sizes because seamless iframes are no longer cool
		try{var x=document.getElementById("player");
		x.style.height=x.contentDocument.getElementsByTagName("body")[0].clientHeight+"px";
		x=document.getElementById("likes");
		x.style.height=x.contentDocument.getElementsByTagName("body")[0].clientHeight+"px";
		}catch(e){}
	},50);
</script>
<script type="text/javascript">
	if(!isBrowserSupported()){
		document.location.href='shitBrowser.php';
	}
</script>
</body>
</html>
