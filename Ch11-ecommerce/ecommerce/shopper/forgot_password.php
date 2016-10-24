<!doctype html>
<html lang=en>
<head>
<title>Forgotten password form</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { margin-left:-220px; width:550px; }
#content h2.main_title { margin-left:-100px; width:350px; }
#content h3 { margin-left:90px; width:730px; }
l { margin-top:0; }
ul li {height:30px; }
p { margin-bottom:-5px; }
form { margin-left:180px; }
#submit {margin-top:0; margin-left:215px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
footer { margin-left:-20px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_forgot.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
</div>
</header>
<div id="content"><!--Forgot password content-->
<?php 
//require ('includes/config.inc.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('mysqli_connect.php');
	// Assign the value FALSe to the variable $buyid 
	$buyid = FALSE;
//if (!empty($_POST['email'])) {
if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
// Does that email address exist in the database?
		$q = 'SELECT buyer_id FROM buyers WHERE email="'.  mysqli_real_escape_string ($dbcon, $_POST['email']) . '"';
		$result = mysqli_query ($dbcon, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbcon));
		if (mysqli_num_rows($result) == 1) { // Retrieve the buyer ID:
			list($buyid) = mysqli_fetch_array ($result, MYSQLI_NUM); 
		} else { // If no such email in the database
			echo '<p class="error">The submitted email address does not match those on file!</p>';
		}
		} else { // If no email address was entered by the user
		echo '<p class="error">You forgot to enter your email address</p>';
		} // End of if empty($_POST['email'])
	if ($buyid) { // If the email address exists in the database
// Create a random password
		$p = substr ( md5(uniqid(rand(), true)), 5, 10);
// Update the database table
		$q = "UPDATE buyers SET psword=SHA1('$p') WHERE buyer_id=$buyid LIMIT 1";
		$result = mysqli_query ($dbcon, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbcon));
		if (mysqli_affected_rows($dbcon) == 1) { // If the password was updated successfully
// Send an email to the buyer
		$body = "Your password has been changed to '$p'. Please log as soon as possible using the new password. Then change it immediately. otherwise, if a hacker has intercepted this email he will know your login details.";
		mail ($_POST['email'], 'Your new password.', $body, 'From: admin@thedovegallery.co.uk');
// Echo a message and exit the code
		echo '<h3>Your password has been changed. You will shortly receive the new temporary password by email.</h3>';
		mysqli_close($dbcon);
		include ('includes/footer.inc');
		exit(); // Stop the script.
		} else { // If it faild to run
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
		}
		} 
	mysqli_close($dbcon);
} 
?>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<h2 class="main_title">Forgotten Your Password?</h2>
<h3>When you click the button, you will shortly receive an email containing your new password<br>
Immediately login with your new password and then change it as quickly as possible.<br>Otherwise, if the email is intercepted, the hacker will know your email and password</h3>  
<form  action="forgot.php" method="post">
<p><label class="label" for="email"><b>Your email adddress</b></label><input id="email" type="text" name="email" size="30" maxlength="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	<br>
	<p><input id="submit" type="submit" name="submit" value="Get a new password"></p>
</form><!-- End of the admin page content -->
<footer>
<?php include ('includes/footer.inc'); ?>
</footer><br></div>
<div>
</div>
</div>
</body>
</html>