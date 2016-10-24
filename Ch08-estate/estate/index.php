<!doctype html>
<html lang=en>
<head>
<title>Real estate home page.</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="ie8.css">
<![endif]-->
<style type="text/css">
#leftcol h3 { margin-bottom:-10px; }
#midcol h3 { margin-top:-10px; }
.black { color:black; }
form { margin-left:15px; font-weight:bold; 	color:black; }
select { margin-bottom:5px; }
h3 { font-size:130%; }
</style>
<!--Add conditional Javascript-->
<!--[if lte IE 8]><script src="html5.js">
</script>
<![endif]-->
</head>
<body>
<div id="container">
<header>
<h1>Devon Real Estate</h1>
<h2>Try our award-winning service</h2>
<img id="rosette" alt="Rosette" title="Rosette" height="127" 
src="images/rosette-128.png" width="128">
</header>
<div id="content">
<div id="leftcol">
	<h3>Search for your dream house</h3><br>
	<span class="black"><strong>IMPORTANT: You must select an item in<br>ALL the fields otherwise the search will fail.</strong></span><br>
<form action="found_houses.php" method="post">
Location<br>
<select name="loctn">
	<option value="">- Select -</option>
	<option value="South_Devon">South Devon</option>
	<option value="Mid_Devon">Mid Devon</option>
	<option value="North_Devon">North Devon</option>
	</select><br>
Maximum Price<br>
	<select name="price">
	<option value="">- Select -</option>
	<option value="200000">&pound;200,000</option>
	<option value="300000">&pound;300,000</option>
	<option value="400000">&pound;400,000</option>
	</select><br>
Type<br>
	<select name="type">
	<option value="">- Select -</option>
	<option value="Det-bung">Detached Bungalow</option>
	<option value="Semi-det-bung">Semi-detached Bungalow</option>
	<option value="Det-house">Detached House</option>
	<option value="Semi-det-house">Semi-detached House</option>
	</select><br>
Number of Bedrooms<br>
<select name="b_rooms">
	<option value="">- Select -</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	</select>
	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form></div>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div><!--end of side menu column-->
<div id="midcol">
	<h3>All houses are situated in the beautiful green<br>rolling countryside of Devon, England, UK</h3>
	<img alt="SW England" height="238" src="images/devon-map-crop.jpg" width="345">
</div>
	<br class="clear">
</div><!--End of page content-->
<footer>footer goes here
</footer>
</div>
</body>
</html>
