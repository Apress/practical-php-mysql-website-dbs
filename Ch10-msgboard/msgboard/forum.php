<?php
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) ) { 
require ( 'login_functions.php' ) ; load() ; }
?>
<!doctype html>
<html lang=en>
<head>
<title>Forum page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
#forum_links { position:absolute; top:115px; left:115px; }
#header #tab-navigation ul { margin-left:185px; }
</style>
</head>
<body>
<div id='container'>
<?php include ( 'includes/header_forum_choice.php' ) ;?>
<h2>Choose a forum</h2>
<div id="forum_links">
<div id="tab-navigation">
	<ul>
		<li><a href="forum_c.php">Comical Quotes</a></li>
		<li><a href="forum_w.php">Wise Quotes</a></li>
	</ul>
</div>
</div>
<br><br>
<br class="clear">
<?php include ( 'includes/footer.php' ) ; ?>
</div>
</body>
</html>