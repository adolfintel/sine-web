<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(999999);
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
</head>
<body <?php if($_SESSION["locale"]=="it") echo "lang='it'"; else echo "lang='en'";?>>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
<h1><?=$_SESSION["locale"]=="it"?"Contatti":"Contacts";?></h1>
<?=$_SESSION["locale"]=="it"?"Puoi contattarci via email all'indirizzo ":"You can contact us via email at ";?><a href="mailto:dossenus91@gmail.com">dossenus91@gmail.com</a>. <br/>
<?=$_SESSION["locale"]=="it"?"o tramite una delle nostre pagine dei social network: ":"or via one of our social network pages: ";?><br/>
<a href="https://www.facebook.com/pages/SINE-Isochronic-Entrainer/649115715183345"><img src="images/fb.png" alt="Facebook"/></a>
<a href="https://twitter.com/sineisochronic"><img src="images/twitter.png" alt="Twitter"/></a>
<a href="https://plus.google.com/101215926277332300359" rel="publisher"><img src="images/gplus.png" alt="Google+"/></a>
<br/><br/>
<?=$_SESSION["locale"]=="it"?"Per favore invia segnalazioni di violazione di copyright via email":"Please report copyright violations via email";?>.
<br/><br/>
<h1><?=$_SESSION["locale"]=="it"?"Spammer, geni del marketing, ecc.":"Spammers, marketing masterminds, etc.";?></h1>
<?=$_SESSION["locale"]=="it"?"SINE &egrave; stato sviluppato per divertimento. Non siamo interessati in":"SINE was developed for fun. We're not interested in";?>
<ul>
<li><?=$_SESSION["locale"]=="it"?"Recensioni/valutazioni false sul Play Store: la tua attivit&agrave; viola i termini d'utilizzo del Play Store e sar&agrave; immediatamente riportata a Google":"Fake Play Store reviews/ratings: your activity violates the Play Store TOS, and will be immediately reported to Google";?></li>
<li><?=$_SESSION["locale"]=="it"?"\"Mi piace\" sui social network":"Social network likes";?></li>
<li><?=$_SESSION["locale"]=="it"?"Offerte che non potremo rifiutare ":"Offers we can't refuse ";?><span style="font-size:0.65em"><?=$_SESSION["locale"]=="it"?"(A meno che Vossia sia Vito Corleone)":"(unless you're Vito Corleone)";?></span></li>
</ul>
<?=$_SESSION["locale"]=="it"?"Abbi rispetto, non spammare":"Have some respect, don't spam";?>.
</div>
<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
