<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Members page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
#midcol { width:98%; }
#midcol p { margin-left:160px; 	
}
</style>
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
	<div id="content"><!-- Start of the member's page content. -->
<h2>Welcome to the Administration Page</h2>
<div id="midcol">
	<h3>You have permission to:</h3><p>&#9632;Edit and delete a record.</p>
	<p>&#9632;Use the View members button to page through all the members.</p>
	<p>&#9632;Use the Search button to locate a particular member</p>
	<p>&#9632;Use the Addresses button to locate a member's Address and Phone 
	number </p>
	<p>&nbsp;</p></div>
</div></div>	
	<div id="footer">
		<?php include("footer.php"); ?>
	</div>
</body>
</html>