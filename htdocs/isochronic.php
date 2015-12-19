<?php
header('Content-Type: text/html; charset=utf-8');
session_cache_expire(999999);
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'headCommon.php'; ?>
<style type="text/css">
#pulses{
display:block;
margin-left:auto;
margin-right:auto;
width:70%;
height:auto;
}
@media all and (max-width: 40em){
#pulses{
display:block;
width:100%;
height:auto;
}
}
</style>
</head>
<body>
<div class="wrapper">
<div class="wrapper">
<?php include 'header.php'; ?>
<div class="content">
<h2><?=$_SESSION["locale"]=="it"?"Cos'&egrave; il Brainwave Entrainment":"What's Brainwave Entrainment"?>?</h2>
<?=$_SESSION["locale"]=="it"?"Il Brainwave Entrainment &egrave; la pratica di utilizzare suoni, stimoli visivi o anche campi elettromagnetici per alterare le frequence delle proprie onde cerebrali":"Brainwave Entrainment is the practice of using sounds, visual stimuli or even electromagnetic fields to alter the frequency of brainwaves"?>.<br/>
<?=$_SESSION["locale"]=="it"?"Ci&ograve; pu&ograve; essere fatto per diverse ragioni: chi soffre di insonnia pu&ograve; trarne molto beneficio, ma pu&ograve; essere utilizzato per migliorare la concentrazione, e addirittura simulare l'effetto di alcune droghe":"It can be done for several reasons: people with insomnia can take great benefit from it, but it can also be used to improve your attention span, and even simulate the effects of some recreational drugs"?>.<br/>
<?=$_SESSION["locale"]=="it"?"L'effetto non &egrave; in alcun modo permanente, e svanisce da solo in meno di un minuto quando lo stimolo &egrave; rimosso":"The effect is not in any way permanent, and usually fades away in less than a minute after the stimuli is removed"?>.<br/>
<?=$_SESSION["locale"]=="it"?"Frequenze comunemente usate sono: 10Hz (sveglio e cosciente), 15-18Hz (concentrazione), 0.5-4Hz (sonno profondo), ecc. Puoi trovare altre frequenze su Internet.<br/>Molto di rado queste frequenze superano i 20Hz. Quest'applicazione supporta fino a 40Hz":"Commonly used frequencies are: 10Hz (awake), 15-18Hz (focusing on something), 0.5-4Hz (deep sleep), etc. You can find more frequencies on the Internet.<br/>Very rarely do these frequencies go beyond 20Hz. This application supports frequencies up to 40Hz"?>.
<h3><?=$_SESSION["locale"]=="it"?"&Egrave; sicuro":"Is it safe"?>?</h3>
<?=$_SESSION["locale"]=="it"?"Il Brainwave Entrainment &egrave; perfettamente sicuro, ma se soffri di epilessia o condizioni simili, dovresti consultare il medico prima di provarlo":"Brainwave Entrainment is perfectly safe, but if you suffer from epilepsy or a similar condition, you may want to consult your medic before trying it"?>.<br/>
<h3><?=$_SESSION["locale"]=="it"?"Funziona":"Does it actually work"?>?</h3>
<?=$_SESSION["locale"]=="it"?"Diverse persone hanno reazioni diverse al Brainwave Entrainment: in generale, ci vuole un po' di pratica prima di ottenere l'effetto desiderato, e per circa il 15% della popolazione, non funziona affatto":"People react differently to Brainwave Entrainment: in general, it takes some practice before you can get the desired effect, and for ~15% of the population, it doesn't work at all"?>.<br/>
<?=$_SESSION["locale"]=="it"?"Se &egrave; la tua prima volta ad utilizzare il Brainwave Entrainment, dovresti cominciare con qualcosa di semplice, come dei Preset per dormire, per poi arrivare fino a cose complicate come le Proiezioni Astrali":"If it's your first time using Brainwave Entrainment, you should start with something simple, like sleep-inducing presets, then you can move on to more complicated things like Astral Projections"?>.
<h2><?=$_SESSION["locale"]=="it"?"Cosa sono i Toni isochronici":"What are Isochronic tones"?>?</h2>
<?=$_SESSION["locale"]=="it"?"I Toni isocronici sono un tipo di stimolo uditivo comunemente usato nel Brainwave Entrainment. Consistono in brevi pulsazioni di un'onda sinusoidale. Queste pulsazioni variano in frequenza. Questa frequenza è detta Frequenza di Entrainment, ed &egrave; la frequenza a cui vuoi sincronizzare le tue onde cerebrali":"Isochronic tones are a commonly used aural stimuli for Brainwave Entrainment. They consist of short pulses of (usually) a sine wave. These pulses can vary in frequency. Their frequency is called Entrainment Frequency, and is the frequency that you want to synchronize your brainwaves to"?>.<br/>
<img id="pulses" src="images/isochronic.png" alt="Isochronic pulses"/>
<div style="text-align:center">
<audio controls="controls">
	<source src="sound/isochronic.ogg" type="audio/ogg" />
	<source src="sound/isochronic.mp3" type="audio/mpeg" />
	<?=$_SESSION["locale"]=="it"?"Il tuo browser non supporta l'audio standard HTML5.":"Your browser doesn't support standard HTML5 audio."?>
</audio><br/>
<?=$_SESSION["locale"]=="it"?"Esempio di pulsazioni Isocroniche a 10Hz":"10Hz Isochronic pulses"?>
</div>
<br/>
<?=$_SESSION["locale"]=="it"?"Altri tipi di stimoli uditivi sono i Battiti binaurali e i Battiti monaurali. I Toni isocronici sono spesso più efficaci, e possono essere ascoltati con degli altoparlanti, a differenza dei Battiti binaurali che richiedono delle cuffie stereo":"Other types of aural stimuli are Binaural Beats and Monaural Beats. Isochronic tones are usually much more effective, and can be played through speakers, unlike Binaural Beats which require headphones"?>.
</div>
<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
