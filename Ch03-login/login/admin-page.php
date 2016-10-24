<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
   header("Location: login.php");
   exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Page for administrator</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; }
</style>
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of the member's page content. -->
<?php
echo '<h2>Welcome to the Admin Page ';
if (isset($_SESSION['fname'])){
echo "{$_SESSION['fname']}";
}
echo '</h2>';
?>
<div id="midcol">
	<h3>You have permission to:</h3><p>&#9632;Use the View members button to see 
			a table of registered members.</p>
	<p>&nbsp;</p></div>
</div>
</div>
	
	<div id="footer">
		<?php include("footer.php"); ?>
	</div>
</body>
</html>
