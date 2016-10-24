<!doctype html>
<html lang="en">
<head>
<title>Change password</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;
}
</style>
</head>
<body>
<div id="container">
<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
	<div id="content"><!-- Start of the page-specific content. -->
<?php 
// This page lets a user change their password.
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('./mysqli_connect.php'); // Connect to the db.
	$errors = array(); // Initialize an error array.
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
	}
	// Check for the current password:
	if (empty($_POST['psword'])) {
		$errors[] = 'You forgot to enter your current password.';
	} else {
		$p = mysqli_real_escape_string($dbcon, trim($_POST['psword']));
	}
	// Check for a new password and match against the confirmed password:
	if (!empty($_POST['psword1'])) {
		if ($_POST['psword1'] != $_POST['psword2']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	if (empty($errors)) { // If everything's OK.
	// Check that they've entered the right email address/password combination:
		$q = "SELECT user_id FROM users WHERE (email='$e' AND psword=SHA1('$p') )";
		$result = @mysqli_query($dbcon, $q);
		$num = @mysqli_num_rows($result);
		if ($num == 1) { // Match was made.
			// Get the user_id:
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			// Make the UPDATE query:
			$q = "UPDATE users SET psword=SHA1('$np') WHERE user_id=$row[0]";		
			$result = @mysqli_query($dbcon, $q);
			if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK.
				// Print a message.
				echo '<h2>Thank you!</h2>
				<h3>Your password has been updated.</h3>';	
			} else { // If it did not run OK.
				// Public message:
				echo '<h2>System Error</h2>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
				// Debugging message:
				echo '<p>' . mysqli_error($dbcon) . '<br /><br />Query: ' . $q . '</p>';
			}
			mysqli_close($dbcon); // Close the database connection.
			// Include the footer and quit the script (to not show the form).
			include ('footer.php'); 
			exit();
		} else { // Invalid email address/password combination.
			echo '<h2>Error!</h2>
			<p class="error">The email address and password do not match those on file.</p>';
		}
	} else { // Report the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p class="error">Please try again.</p><p><br /></p>';
	} // End of if (empty($errors)) IF.
	mysqli_close($dbcon); // Close the database connection.
} // End of the main Submit conditional.
?>
<h2>Change Your Password</h2>
<form action="register-password.php" method="post">
	<p><label class="label" for="email">Email Address:</label><input id="email" type="text" name="email" size="40" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
	<p><label class="label" for="psword">Current Password:</label><input id="psword" type="password" name="psword" size="12" maxlength="12" value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>"></p>
	<p><label class="label" for="psword1">New Password:</label><input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>"></p>
	<p><label class="label" for="psword2">Confirm New Password:</label><input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>"></p>
	<p><input id="submit"type="submit" name="submit" value="Change Password"></p>
</form>
<?php include ('footer.php'); ?></p>
	</div><!-- End of the page-specific content. -->
	</div>
</body>
</html>