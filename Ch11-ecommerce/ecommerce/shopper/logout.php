<!doctype html>
<html lang=en>
<head>
<title>Logout code</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#tab-navigation ul { margin-left:190px; }
h3 { text-align:center; margin-top:-10px; }
.thanks {
	margin-left:-120px;
}
footer {
	text-align:center;
}
</style> 
</head>
<body>
<div id='container'>
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
<?php 
// Start the session
session_start() ;
// Redirect the user if not logged in
if ( !isset( $_SESSION[ 'member_id' ] ) ) 
{ 
require ( 'login_functions.php' ) ; 
}
// Remove the session variables from the session
$_SESSION = array() ;
// Destroy the session
session_destroy() ;
// Display the thank you message
echo '<h2 class="thanks">Thank you for logging out!</h2>
<br><h3>Logging out is a very important security measure</h3> ';
?>
<br class="clear">
<footer>
<?php include ( 'includes/footer.inc' ) ; ?>
</footer>
</div>
</div>
</body>
</html>