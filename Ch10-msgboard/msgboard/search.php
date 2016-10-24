<!doctype html>
<html lang=en>
<head>
<title>Search form</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
#tab-navigation ul { margin-left:145px; }
</style>
</head>
<body>
<div id="container">
<?php
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) ) { require ( 'login_functions.php' ) ; load() ; }
include("includes/header_forum_choice.php"); 
?>
	<div id="content"><!-- Start of search page content. -->
<h2>Search for a word or phrase in the quotes</h2>
<form action="quotes_found.php" method="post">
	<p><label class="label" for="target">Enter a word or phrase: </label>
	<input id="target" type="text" name="target" size="40" maxlength="60" value="<?php if (isset($_POST['target'])) echo $_POST['target']; ?>"></p>
	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form>
<?php include ('includes/footer.php'); ?>
<!-- End of the search page content. -->
</div>
</div>	
</body>
</html>