<div id="cookieInfoContainer" style="width:100%; display:block; position:fixed; bottom:0; left:0; z-index:99999;">
<script type="text/javascript">
if(localStorage.cookieOk) document.getElementById('cookieInfoContainer').style.display='none';
</script>
<div style="font-size:0.8em; background-color:#000000; color:#FFFFFF; text-align:justify; display:block; padding:1em;">
<input type="button" value="<?php if($_SESSION["locale"]=="it"){?>Non mostrare pi&ugrave;<?php }else{ ?>Do not show again<?php } ?>" style="float:right" onclick="localStorage.cookieOk='1'; document.getElementById('cookieInfoContainer').style.display='none';"/>
<?php if($_SESSION["locale"]=="it"){?>
Utilizzando questo sito si accetta l'utilizzo di cookie.
<?php }else{ ?>
By using this site, you agree to our use of cookies.
<?php } ?>
<div style="clear:both;"></div>
<a id="showPolicy" style="color:#AAAAAA;" onclick="document.getElementById('privacyPolicy').style.display='block'; document.getElementById('showPolicy').style.display='none'">
<?php if($_SESSION["locale"]=="it"){?>
Pi&ugrave; informazioni
<?php }else{ ?>
I want more information
<?php } ?>
</a>
<div id="privacyPolicy" style="display:none; padding-top:1em;">
<div style="overflow-y:scroll; height:5em;">
<?php if($_SESSION["locale"]=="it"){?>
Questo sito utilizza un cookie tecnico per memorizzare impostazioni della lingua e le votazioni sui preset.<br/>
Non effettuiamo tracciamenti, non memorizziamo cookie di terze parti, e non inseriamo iframe verso altri siti che potrebbero farlo.<br/>
Prendiamo la tua privacy molto seriamente.
<?php }else{ ?>
This site uses a cookie to store language settings and preset ratings.<br/>
We do not track you, or store third party cookies, and the site does not contain iframes to other sites that may do that.<br/>
We take your privacy very seriously.
<?php } ?>
</div>
</div>
</div>
</div>
