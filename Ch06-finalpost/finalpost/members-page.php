<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))
{  header("Location: login.php");
   exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Members' page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
#mid-right-col { text-align:center; margin:auto;
}
#midcol h3 { font-size:130%; margin-top:0; margin-bottom:0;
}
</style>
</head>
<body>
<div id="container">
<?php include("includes/header-members.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
	<div id="content"><!-- Start of the member's page content. -->
<?php
echo '<h2>Welcome to the Members\' Page ';
if (isset($_SESSION['fname'])){
echo "{$_SESSION['fname']}";
}
echo '</h2>';
?>
<div id="midcol">
<div id="mid-left-col">
<h3>Member's Events</h3>
<p>The Members' page content. The Members' page content. The Members' page content.
<br>The Members' page content. The Members' page content. The Members' page content.<br>The Members' page content. 
The Members' page content. The Members' page content.<br>The Members' page content. The Members' page content. 
The Members' page content.</p></div>
<div id="mid-right-col">
<h3>Special offers to Members only.</h3>
<p><b>T-Shirts &pound;10.00</b></p>
<img alt="Polo shirt" title="Polo shirt" height="207" src="images/polo.png" width="280"><br>
<br>
</div>
</div></div><!-- End of the Members' page content. -->
</div>	
<?php include('includes/footer.php'); ?></body>
</html>