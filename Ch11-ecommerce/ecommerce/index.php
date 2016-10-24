<!doctype html>
<html lang=en>
<head>
<title>Home page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="admin_form.css">
<style type="text/css">
#logo { position:absolute; left:10px; top:5px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
#midcol h3.search {
	width:500px; margin-left:142px;}
#midcol p.gallery {
	margin-left:70px;
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_home.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
	</div>
</header>
<div id="content"><!--Start of admin page content. -->
<div id="rightcol">
	<nav>
	<?php include('includes/menu.inc'); ?>
	</nav>
</div>
<div id="midcol">
	<h2>Welcome to the Dove Gallery</h2>
	<h3 class="search">To search the gallery, please register and log in</h3>
	<p class="gallery">
	<img alt="Brown Jug by Adrian West" height="228" src="images/aw-brown-vessel-200.jpg" width="200"><img alt="L-Silver washed blue" height="245" src="images/L-silver-studded-blue.jpg" width="200"><img alt="White Jug" height="228" src="images/aw-white-jug-home.jpg" width="168"><img alt="Copper kettle" height="213" src="images/k-copper-kettle-home.jpg" width="252">&nbsp;<img alt="Looking Back at Beer" height="213" src="images/L-looking-back-a-beer.jpg" width="300">&nbsp;&nbsp;&nbsp; </p>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer></div>
</div></div>
</body>
</html>