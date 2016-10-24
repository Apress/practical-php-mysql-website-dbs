<!doctype html>
<html lang=en>
<head>
<title>Login page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { width:60px; margin-left:-40px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
form { 	margin-left:130px; }
.submit { margin-left:215px; }
.cntr { text-align:center; margin-left:20px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_login.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
</div>
</header><div id="content"><!-- Start of the login page content. -->
<div id="rightcol">
	<nav>
	<?php include('includes/menu.inc'); ?>
	</nav>
</div>
<?php 
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//connect to database
	require ('mysqli_connect.php');
	// Validate the email address:
	if (!empty($_POST['email'])) {
			$e = mysqli_real_escape_string($dbcon, $_POST['email']);
	} else {
	$e = FALSE;
		echo '<p class="error">You forgot to enter your email address.</p>';
	}
	// Validate the password
	if (!empty($_POST['psword'])) {
			$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
	} else {
	$p = FALSE;
		echo '<p class="error">You forgot to enter your password.</p>';
	}
	if ($e && $p){//if no problems
// Retrieve the user_id, first_name and user_level for that email/password combination
		$q = "SELECT buyer_id, fname, user_level FROM buyers WHERE (email='$e' AND psword=SHA1('$p'))";		
		$result = mysqli_query ($dbcon, $q); 
		// Check the result:
		if (@mysqli_num_rows($result) == 1) {//The user input matched the database record
		// Start the session, fetch the record and insert the three values in an array
		session_start();
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$_SESSION['user_level'] = (int) $_SESSION['user_level']; // Ensures the user level is an integer.
$url = ($_SESSION['user_level'] === 51) ? 'admin_page.php' : 'buyers_page.php'; // Ternary operation to set the URL
header('Location: ' . $url); // The buyer is directed to the appropriate page
exit(); // Cancels the rest of the script
	mysqli_free_result($result);
	mysqli_close($dbcon);
	} else { // No match was made
	echo '<p class="error">The email address and password entered do not match our records.<br>Perhaps you need to register, click the Register button on the header menu</p>';
	}
	} else { // If there was a problem
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbcon);
	} // End of SUBMIT conditional
?>
<!-- Display the form fields-->
<div id="loginfields">
<?php include ('includes/login_page.inc'); ?>
</div>
<p>&nbsp;</p>
<p class="cntr"><a href="forgot.php"><b>Forgotten your password?</b></a></p>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer>
</div>
</div>	
</body>
</html>