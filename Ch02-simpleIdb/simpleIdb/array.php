<!doctype html>
<html lang=en>
<head>
<title>The array page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id='container'>
<?php include('header-for-template.php'); ?>
<?php include('nav.php'); ?>
<?php include('info-col.php'); ?>
<div id='content'><!--Start of page content.-->
<h2>This is the Array Page</h2>
<?php
$cereals = array();
$cereals[0] = "oats";
$cereals[1] = "barley";
$cereals[2] = "corn";
$cereals[3] = "wheat";
echo ("$cereals[0]&nbsp;" . "$cereals[1] " . "$cereals[2] " . $cereals[3]);
?>
	<!--End of the page content.-->
</div>
</div>	
<?php include('footer.php'); ?>
</body>
</html>