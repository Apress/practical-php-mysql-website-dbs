<!doctype html>
<html lang=en>
<head>
<title>The simple array page</title>
<meta charset=utf-8>
<style type="text/css">
.cntr {text-align:center; }
</style>
</head>
<body>
<h2 class="cntr">This is the Array Page</h2>
<p class="cntr">
<?php
$cereals = array();
$cereals[0] = "oats";
$cereals[1] = "barley";
$cereals[2] = "corn";
$cereals[3] = "wheat";
echo ("$cereals[0]&nbsp;" . "$cereals[1] " . "$cereals[2] " . $cereals[3]);
?>
</p>
</body>
</html>