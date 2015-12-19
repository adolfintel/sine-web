<?php
header('Content-Type: text/html; charset=utf8');
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



<?php include 'footer.php'; ?>
</div>
</div>
</body>
</html>
