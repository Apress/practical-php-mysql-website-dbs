<!doctype html>
<html lang=en>
<head>
<title>Admin and add artist page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { margin-left:-220px; width:550px; }
#content h2.main_title { margin-left:-20px; width:250px; }
ul { margin-top:0; }
ul li { height:30px; }
p { margin-bottom:-5px; width:600px; }
form { 	margin-left:180px; }
#submit {margin-top:0; margin-left:215px; }
.cntr {	text-align:center;}
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
footer { margin-left:150px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_admin.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
	</div>
</header>
<div id="content"><!-- Start of admin page content. -->
<?php
// Has the form has been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Set an error array.
// Has an artist's first name been entered?
	if (!empty($_POST['afname'])) {
		$afname = trim($_POST['afname']);
	} else {
		$afname = trim($_POST['afname']);
	}
// Has an artist's middle name been entered?
	if (!empty($_POST['amname'])) {
		$amname = trim($_POST['amname']);
	} else {
		$amname = trim($_POST['amname']);
	}
// Has the artist's last name been entered?
	if (empty($_POST['alname'])) {
		$errors[] = 'You forgot to enter the artist\'s last name';
	} else {
		$alname = trim($_POST['alname']);
	}	
if (empty($errors)) { // If the wuery ran OK
	// Register the artist in the database
		require ('mysqli_connect.php'); // Connect to the db.
		// Make the query:
		$q = "INSERT INTO artists (artist_id, afname, amname, alname) VALUES (' ', '$afname', '$amname', '$alname')";		
		$result = @mysqli_query ($dbcon, $q); // Run the query.
		if ($result) { // If a result was achieved
		echo '<h2>The artist was successfully added. Add another one?</h2><br>';
		} else { // If the query failed to run
		// Message:
			echo '<h2>System Error</h2>
			<p class="error">The artist could not be added due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
	} else { // Display any errors
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Dispaly any errors
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if error checks
} // End of the conditionals
?>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<h2 class="main_title">Add an Artist</h2>
<h3 class="cntr">If the artist uses only one name (e.g., Picasso) enter it as the last name</h3> 
<form  action="admin_page.php" method="post">
<p><label class="label" for="afname"><b>Artist's First Name:</b></label><input id="afname" type="text" name="afname" size="30" maxlength="30" value="<?php if (isset($_POST['afname'])) echo $_POST['afname']; ?>">
<p><label class="label" for="amname"><b>Artist's Middle Name:</b></label><input id="amname" type="text" name="amname" size="30" maxlength="30" value="<?php if (isset($_POST['amname'])) echo $_POST['amname']; ?>">
<p><label class="label" for="alname"><b>Artist's Last Name:</b></label><input id="alname" type="text" name="alname" size="30" maxlength="30" value="<?php if (isset($_POST['alname'])) echo $_POST['alname']; ?>">
<br>
<p><input id="submit" type="submit" name="submit" value="Add"></p>
</form><!-- End of the admin page content -->
<footer>
<?php include ('includes/footer.inc'); ?>
</footer><br></div></div>
<div>
</div>
</body>
</html>