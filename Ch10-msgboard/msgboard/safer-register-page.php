<!doctype html>
<html lang=en>
<head>
<title>Registration page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
#midcol { width:98%; margin:auto; }
input, select { margin-bottom:5px; }
#tab-navigation ul { position:absolute; top: 135px; left:500px; }
p.warning { text-align:center; font-weight:bold; }
h2 { margin-bottom:0; margin-top:5px; }
h3.content { margin-top:0; }
.cntr { text-align:center; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header_register.php"); ?>
<?php include("includes/info-col.php");?>
<div id="content"><!--Start of the page-specific content-->
<?php
require ('mysqli_connect.php'); // Connect to the database
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an errors array
// Trim the username
$unme = trim($_POST['uname']);
// Strip HTML tags and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($unme));
// Get string lengths
$strLen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strLen < 1 ) {
    $errors[] = 'You forgot to enter your secret username.';
}else{
$uname = $stripped;
}
//Set the email variable to FALSE
$e = FALSE;									
// Check that an email address has been entered				
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
}
//Remove spaces from beginning and end of the email address and validate it	
if (filter_var((trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {	
//A valid email address is then registered
$e = mysqli_real_escape_string($dbcon, (trim($_POST['email'])));
}else{									
$errors[] = 'Your email is not in the correct format.';
}
// Check that a password has been entered, if so, does it match the confirmed password
if (empty($_POST['psword1'])){
$errors[] ='Please enter a valid password';
}
if(!preg_match('/^\w{8,12}$/', $_POST['psword1'])) {
$errors[] = 'Invalid password, use 8 to 12 characters and no spaces.';
}
if(preg_match('/^\w{8,12}$/', $_POST['psword1'])) {
$psword1 = $_POST['psword1'];
}
if($_POST['psword1'] == $_POST['psword2']) {
$p = mysqli_real_escape_string($dbcon, trim($psword1));
}else{
$errors[] = 'Your two password do not match.';
}

if (empty($errors)) { // If there are no errors. register the user in the database
		// Make the query
		$q = "INSERT INTO members (member_id, uname, email, psword, reg_date ) VALUES (' ', '$uname', '$e', SHA1('$p'), NOW()  )";		
		$result = @mysqli_query ($dbcon, $q); // Run the query
		if ($result) { // If the query ran OK
		header ("location: register_thanks.php"); 
		exit();
		} else { // If there was a problem
		// Error message
			echo '<h2>System Error</h2>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
		// Include the footer and quit the script
		include ('includes/footer.php'); 
		exit();
	} else { // Display the errors
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Display each error
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditionals
?>
<div id="midcol">
<h2>Membership Registration</h2>
		<h3>All the fields must be filled out</h3>
	<p class="warning">IMPORTANT: Do NOT use your real name for the username.<br>The username 
	must be one word 8 to 12 characters long with no spaces. <br>For extra 
	security include a number at the end of, or within the user name. (example: catswhisker7)
	</p>
	<p class="cntr"><strong>Terms and conditions: </strong>Your registration and all your messages will be immediately deleted<br>if you 
	post unpleasant, obscene or defamatory message to this forum.</p>
			<h3 class="content">When you click the 'Register' button, you will 
	see a confirmation page <br></h3>
<form action="safer-register-page.php" method="post">
		<label class="label" for="uname">User Name:</label><input id="uname" type="text" name="uname" size="12" maxlength="12" value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">&nbsp;8 
	to 12 characters
	<br><label class="label" for="email">Email Address:</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
	<br><label class="label" for="psword1">Password:</label><input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp;8 
	to 12 characters
	<br><label class="label" for="psword2">Confirm Password:</label><input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" >
	<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</div></div></div>
<?php include ('includes/footer.php'); ?>
<!-- End of the registration page content -->
</body>
</html>