<?php											
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
header("Location: login.php");
exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Edit a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; }
input.fl-left { float:left; }
#submit { float:left; }
</style>
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of the page-specific content. -->
<h2>Edit a Record</h2>
<?php 
// After clicking the Edit link in the found_record.php page, the editing interface appears 
// The code looks for a valid user ID, either through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // If no valid ID, stop the script
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('footer.php'); 
	exit();
}
require ('./mysqli_connect.php'); 
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	// Look for the first name
	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
	}
	// Look for the last name
	if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
	}
	// Look for the email address
	if (empty($_POST['email'])) {
	$errors[] = 'You forgot to enter your email address.';
	} else {
	$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
	}
	if (empty($errors)) { // If everything's OK
		//  Check that the email address is not already in the database
				$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";
		$result = @mysqli_query($dbcon, $q);
		if (mysqli_num_rows($result) == 0) {
		// Make the update query:
			$q = "UPDATE users SET fname='$fn', lname='$ln', email='$e' WHERE user_id=$id LIMIT 1";
			$result = @mysqli_query ($dbcon, $q);
			if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
			// Echo a message if the edit was satisfactory:
				echo '<h3>The user has been edited.</h3>';	
						} else { // Echo a message if the query failed.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
			} else { // Already registered
			echo '<p class="error">The email address has already been registered.</p>';
		}
		} else { // Display the errors.
		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Echo each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	} // End of if (empty($errors))section.
} // End of the conditionals
// Select the user's information:
$q = "SELECT fname, lname, email FROM users WHERE user_id=$id";		
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form:
	echo '<form action="edit_record.php" method="post">
<p><label class="label" for="fname">First Name:</label><input class="fl-left" id="fname" type="text" name="fname" size="30" maxlength="30" value="' . $row[0] . '"></p>
<br><p><label class="label" for="lname">Last Name:</label><input class="fl-left" type="text" name="lname" size="30" maxlength="40" value="' . $row[1] . '"></p>
<br><p><label class="label" for="email">Email Address:</label><input class="fl-left" type="text" name="email" size="30" maxlength="50" value="' . $row[2] . '"></p>
<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>
<br><input type="hidden" name="id" value="' . $id . '" />
</form>';
} else { // The user could not be validated
	echo '<p class="error">This page has been accessed in error.</p>';
}
mysqli_close($dbcon);
include ('footer.php');
?>
</div>
</div>
</body>
</html>