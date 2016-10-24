<!doctype html>
<html lang=en>
<head>
<title>Register page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
#midcol { width:98%; margin:auto; }
input, select { margin-bottom:5px; }
h2 { margin-bottom:0; margin-top:5px; }
h3.content { margin-top:0; }
.cntr { text-align:center; } 
</style>
</head>
<body>
<div id="container">
<?php include("register-header.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col-cards.php");?>
<div id="content"><!-- Start of the register page content -->
<?php
require ('mysqli_connect.php'); // Connect to the database.
// This code inserts a record into the users table
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an array to hold the errors
	// Check for a title:
	if (empty($_POST['title'])) {
		$errors[] = 'You forgot to enter your title.';
	} else {
		$title = mysqli_real_escape_string($dbcon, trim($_POST['title']));
	}
	// Check for a first name:
	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
			$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
	}
	// Check for a last name:
	if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
	}
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
	}
	// Check for a password and match it against the confirmed password:
	if (!empty($_POST['psword1'])) {
		if ($_POST['psword1'] != $_POST['psword2']) {
			$errors[] = 'Your two passwords did not match.';
		} else {
			$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	if (empty($_POST['uname'])) {
		$errors[] = 'You forgot to enter your secret username.';
	} else {
		$uname = trim($_POST['uname']);
	}
// Check for an membership class
	if (empty($_POST['class'])) {
		$errors[] = 'You forgot to choose your membership class.';
	} else {
		$class = trim($_POST['class']);
	}
	// Check for address1:
	if (empty($_POST['addr1'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$ad1 = mysqli_real_escape_string($dbcon, trim($_POST['addr1']));
	}
	// Check for address2:
		if (!empty($_POST['addr2'])) {
		$ad2 = mysqli_real_escape_string($dbcon, trim($_POST['addr2']));
}else{
$ad2 = NULL;
	}
	// Check for city:
	if (empty($_POST['city'])) {
		$errors[] = 'You forgot to enter your City.';
	} else {
		$cty = mysqli_real_escape_string($dbcon, trim($_POST['city']));
	}
// Check for the county:
	if (empty($_POST['county'])) {
		$errors[] = 'You forgot to enter your county.';
	} else {
		$cnty = mysqli_real_escape_string($dbcon, trim($_POST['county']));
	}	
	// Check for the post code:
	if (empty($_POST['pcode'])) {
		$errors[] = 'You forgot to enter your post code.';
	} else {
		$pcode = mysqli_real_escape_string($dbcon, trim($_POST['pcode']));
	}
	// Check for the phone number:
		if (!empty($_POST['phone'])) {
		$ph = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
}else{
$ph = NULL;
	}
	if (empty($errors)) { // If there were no errors
//Determine whether the email address has already been registered	
$q = "SELECT user_id FROM users WHERE email = '$e' ";
$result=mysqli_query ($dbcon, $q) ; 	
if (mysqli_num_rows($result) == 0){//The mail address has not been registered already therefore register the user in the users table
		// Make the query:
		$q = "INSERT INTO users (user_id, title, fname, lname, email, psword, registration_date, uname, class, addr1, addr2, city, county, pcode, phone, paid) VALUES (' ', '$title', '$fn', '$ln', '$e', SHA1('$p'), NOW(), '$uname', '$class', '$ad1', '$ad2', '$cty', '$cnty', '$pcode', '$ph', '$pd' )";		
		$result = @mysqli_query ($dbcon, $q); // Run the query.
		if ($result) { // If it ran OK.
		header ("location: register-thanks.php"); 
		exit();
		} else { // If it did not run OK
		// Error message:
			echo '<h2>System Error</h2>
			<p class="error">Registration failed because of a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
		// Include the footer and stop the script
		include ('footer.php'); 
		exit();
}else{//The email address is already registered
echo	'<p class="error">The email address is not acceptable because it is already registered</p>';
}
	} else { // Report the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditional.
?>
<div id="midcol">
<h2>Membership Registration</h2>
		<h3 class="content">Items marked with an asterisk * are essential</h3>
			<h3 class="content">When you click the 'Register' button, you will 
			be switched 
			to a page<br>for paying your membership fee with PayPal or a Credit/Debit 
			card</h3>
			<p class="cntr"><b>Membership classes:</b> Standard 1 year: &pound;30, Standard 5years: 
			&pound;125, Armed Forces 1 year: &pound;5,<br>Under 22 one year: &pound;2,&nbsp; Other: If 
			you can't afford &pound;30 please give what you can, minimum &pound;15 </p>
<form action="register-page.php" method="post">
	<label class="label" for="title">Title*</label><input id="title" type="text" name="title" size="15" maxlength="12" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
	<br><label class="label" for="fname">First Name*</label><input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
	<br><label class="label" for="lname">Last Name*</label><input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
	<br><label class="label" for="email">Email Address*</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
	<br><label class="label" for="psword1">Password*</label><input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp;8 
	to 12 characters
	<br><label class="label" for="psword2">Confirm Password*</label><input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" >
	<br><label class="label" for="uname">Secret User Name*</label><input id="uname" type="text" name="uname" size="12" maxlength="12" value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">&nbsp;6 
	to 12 characters
	<br><label class="label" for="class">Membership Class*</label>
	<select name="class">
	<option value="">- Select -</option>
	<option value="30"<?php if (isset($_POST['class']) AND ($_POST['class'] == '30')) echo ' selected="selected"'; ?>>Standard 1 year &pound;30</option>
	<option value="125"<?php if (isset($_POST['class']) AND ($_POST['class'] == '125')) echo ' selected="selected"'; ?>>Standard 5 years &pound;125</option>
	<option value="5"<?php if (isset($_POST['class']) AND ($_POST['class'] == '5')) echo ' selected="selected"'; ?>>Armed Forces 1 year &pound;5</option>
	<option value="2"<?php if (isset($_POST['class']) AND ($_POST['class'] == '2')) echo ' selected="selected"'; ?>>Under 22 1 year &pound;2**</option>
	<option value="15"<?php if (isset($_POST['class']) AND ($_POST['class'] == '15')) echo ' selected="selected"'; ?>>Minimum 1 year &pound;15</option>
	</select><!--<input id="class" type="text" name="class" size="30" maxlength="30" value="<?php if (isset($_POST['class'])) echo $_POST['class']; ?>">-->
	<br><label class="label" for="addr1">Address*</label><input id="addr1" type="text" name="addr1" size="30" maxlength="30" value="<?php if (isset($_POST['addr1'])) echo $_POST['addr1']; ?>">
	<br><label class="label" for="addr2">Address</label><input id="addr2" type="text" name="addr2" size="30" maxlength="30" value="<?php if (isset($_POST['addr2'])) echo $_POST['addr2']; ?>">
	<br><label class="label" for="city">City*</label><input id="city" type="text" name="city" size="30" maxlength="30" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">
	<br><label class="label" for="county">County*</label><input id="county" type="text" name="county" size="30" maxlength="30" value="<?php if (isset($_POST['county'])) echo $_POST['county']; ?>">
	<br><label class="label" for="pcode">Post Code*</label><input id="pcode" type="text" name="pcode" size="15" maxlength="15" value="<?php if (isset($_POST['pcode'])) echo $_POST['pcode']; ?>">
	<br><label class="label" for="phone">Telephone</label><input id="phone" type="text" name="phone" size="30" maxlength="30" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
	<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</div></div></div>
<?php include ('footer.php'); ?>
<!-- End of the register page content -->
</body>
</html>