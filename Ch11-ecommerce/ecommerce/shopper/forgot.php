<!doctype html>
<html lang=en>
<head>
<title>Forgotten password form</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { margin-left:-220px;}
#content h2.main_title { margin-left:-100px; }
#content h3 { margin-left:90px; }
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
<div id="content">
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('mysqli_connect.php');
	// Assign the value FALSe to the variable $buyid 
	$buyid = FALSE;
// Validate the email address...
//if (!empty($_POST['email'])) {
if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
// Does that email address exist in the database?
		$q = 'SELECT buyer_id FROM buyers WHERE email="'.  mysqli_real_escape_string ($dbcon, $_POST['email']) . '"';
		$result = mysqli_query ($dbcon, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbcon));
		if (mysqli_num_rows($result) == 1) { // Retrieve the buyer ID:
			//list($buyid) = mysqli_fetch_array ($result, MYSQLI_NUM); 
		$row = mysqi_fetch_array($result,MYSQLI_NUM);
		$buyid = $row[0];
		} else { // If the buyid for the email address was not retrieved
			echo '<p class="error">That email is not in the database</p>';
		}
		} 
	if ($buyid) { // If buyid for the email address was retrieved, create a random password
		$p = substr ( md5(uniqid(rand(), true)), 5, 10);
// Update the database table
		$q = "UPDATE buyers SET psword=SHA1('$p') WHERE buyer_id=$buyid LIMIT 1";
		$result = mysqli_query ($dbcon, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbcon));
		if (mysqli_affected_rows($dbcon) == 1) { // If the password was updated successfully
// Send an email to the buyer
		$body = "Your password has been changed to '$p'. Please login as soon as possible using the new password. Then change it immediately. otherwise, if a hacker has intercepted this email he will know your login details.";
		mail ($_POST['email'], 'Your new password.', $body, 'From: admin@thedovegallery.co.uk');
// Echo a message and exit the code
		echo '<h3>Your password has been changed. You will shortly receive the new temporary password by email.</h3>';
		mysqli_close($dbcon);
		include ('includes/footer.inc');
		exit(); // Stop the script.
		} else { // If the query failed to run
			echo '<p class="error">Due to a system error, your password could not be changed. We apologize for any inconvenience.</p>'; 
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
<h3>When you apply, you will receive your new password in an email. Access that 
email<br>in the next few minutes. Don't delay! For 
maximum security, immediately login with your new password and then change the 
password as quickly as possible.<br></h3>  
<form  action="forgot.php" method="post">
<p><label class="label" for="email"><b>Your email adddress</b></label><input id="email" type="text" name="email" size="30" maxlength="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	<br>
	<p><input id="submit" type="submit" name="submit" value="Get a new password"></p>
</form>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer><br></div>
<div>
</div>
</div>
</body>
</html>