<?php
// This is the logout page for the site.
//require ('config.inc.php'); 
session_start();//access the current session.
//include ('header.php');
// If no first_name session variable exists, redirect the user:
//if no session variable then redirect the user
if (!isset($_SESSION['user_id'])) {
header("location:index.php");
exit();
//functions are needed
//require('login_functions.inc.php');
//redirect_user();
//header("location:index-register.php");
//exit();

}else{ //cancel the session
	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-3600); // Destroy the cookie.
setcookie('PHPSESSID', ", time()-3600,'/', ", 0, 0);//Destroy the cookie
header("location:index.php");
exit();

}
//include('header.php');
// Print a customized message:
//echo "<h3>You are now logged out.</h3>";
//include('footer.php');
?>