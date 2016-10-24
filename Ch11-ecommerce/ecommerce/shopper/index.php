<!doctype html>
<html lang=en>
<head>
<title>Buyer's page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
p { font-size:110%; }
#midcol h2 { width:400px; }
#mid-left-col h3 {font-size:150%;
	text-align:left;
}
select { width:130px; }
form { 	margin-left:150px; }
.search { margin:0 0 0 120px; font-weight:bold; font-size:130%; color:white; }
#submit { width:70px; position:absolute; left:190px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_forgot.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
	</div>
</header>
<div id="content"><!-- Start of buyers' page content. -->
<div id="rightcol">
	<nav>
	<?php include('includes/menu.inc'); ?>
	</nav>
</div>
<div id="midcol">
<div id="mid-left-col">
	<h3><b>Welcome to the Dove Gallery</b></h3>
	<p><b>All prices include frames, sales tax, delivery and insurance</b></p>
	<p class="search"><strong>Search for a painting</strong></p>
<form action="found_paintings.php" method="post">
		<strong>Type</strong><br>
	<select name="type">
	<option value="">- Select -</option>
	<option value="still-life">Still Life</option>
	<option value="nature">Nature</option>
	<option value="landscape">Landscape</option>
	<option value="abstract">Abstract</option>
	</select><br>
		<strong>Maximum Price</strong><br>
	<select name="price">
	<option value="">- Select -</option>
	<option value="40">&pound;40</option>
	<option value="80">&pound;80</option>
	<option value="800">&pound;800</option>
	</select><br>
	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form>
</div>
<div id="mid-right-col">
	<p><img alt="Copper Kettle by James Kessell" height="254" src="images/k-copper-kettle-300.jpg" width="300">&nbsp;</p>
</div>
<br class="clear">
</div>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer></div>
</div>
</body>
</html>