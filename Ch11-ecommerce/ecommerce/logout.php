<?php
// This is the logout page for the site.
session_start();//access the current session.
//if no session variable then redirect the user
if (!isset($_SESSION['user_id'])) {
header("location:index.php");
exit();
}else{ //cancel the session
	$_SESSION = array(); // Destroy the variables
	session_destroy(); // Destroy the session
	setcookie('PHPSESSID', time()-3600,'/', 0, 0);//Destroy the cookie
	header("location:index.php");
	exit();
}
?>