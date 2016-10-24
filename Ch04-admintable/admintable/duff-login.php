<!doctype html>
<html lang=en>
<head>
<title>The Login page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of the login page content. -->
</div>
</div>	
</body>
</html>
<?php 
// This section processes submissions from the login form.
// The script now stores the HTTP_USER_AGENT value for added security.
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Need two helper files:
	require ('login_functions.inc.php');
	require ('./mysqli_connect.php');
	// Check the login:
	list ($check, $data) = check_login($dbcon, $_POST['email'], $_POST['psword'], $_POST['user_level']);
	if ($check) { // OK!
		// Set the session data:
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['fname'] = $data['fname'];
		$_SESSION['user_level'] = $data['user_level'];
		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
	}	
		// Redirect:
		//redirect_user('loggedin.php');
	if ($data['user_level'] == 0)	
	{header ("location:members-page.php");
	exit();}
	else
	if ($data['user_level'] == 1)	
	{header ("location:admin-page.php");
	exit();}
	else // If unsuccessful!
		// Assign $data to $errors for login_page.inc.php:
		//$errors = $data;
echo ("<h2>Sorry but you are not registered with those details</h2>");
echo ("<h3>Perhaps you entered incorrect information. Please try again.</h3>");
echo ("Perhaps you need to register, just click the Register button on the top right menu");	
	mysqli_close($dbcon); // Close the database connection.
} // End of the submition conditionals.
// Create the page:
include ('login_page.inc.php');
?>