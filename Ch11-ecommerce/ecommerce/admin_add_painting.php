<!doctype html>
<html lang=en>
<head>
<title>Home page and add a painting</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#header-button { margin-top:-10px; }
#content h2 { margin-left:-70px; }
form { margin-left:140px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
#submit { margin-left:-170px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_add_painting.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
	</div>
</header>
	<div id="content"><!--Start of admin add paintings content-->
<?php
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an array to contain the error messages 
// Check if a thumbnail url has been entered
	if (empty($_POST['thumb'])) {
				$errors[] = 'You forgot to enter the thumbnail url';
	} else {
		$thumb = ($_POST['thumb']);
	}
// Check for a type
	if (empty($_POST['type'])) {
		$errors[] = 'You forgot to enter the type of painting';
	} else {
		$type = trim($_POST['type']);
	}
// Has a price been entered?	
if (empty($_POST['price'])){
$errors[] ='You forgot to enter the price.' ;
}
elseif (!empty($_POST['price'])) {			
//Remove unwanted characters and use regex to ensure that the remaining characters are digits
$price = preg_replace('/\D+/', '', ($_POST['price']));
}
// Has the medium been entered?
	if (empty($_POST['medium'])) {
				$errors[] = 'You forgot to enter the medium';
	} else {
		$medium = ($_POST['medium']);
	}

	// Has the artist been entered?
	if (empty($_POST['artist'])) {
				$errors[] = 'You forgot to enter the artist';
	} else {
		$artist = ($_POST['artist']);
	}
// Has a brief description been entered?
	if (empty($_POST['mini_descr'])) {
			 $errors[] = 'You forgot to enter the brief description';
	} else{
	 $mini_descr = strip_tags($_POST['mini_descr']);
	 }
// Has the PPcode been entered?
	if (empty($_POST['ppcode'])) {
			 $errors[] = 'You forgot to enter the PayPal code';
	} else{
	 $ppcode = ($_POST['ppcode']);
	 }
if (empty($errors)) { // If no errors were encountered
	// Register the painting in the database
		require ('mysqli_connect.php'); // Connect to the database
		// Make the query:'
		$q = "INSERT INTO art (art_id, thumb, type,  medium, artist, mini_descr, price) VALUES (' ', '$thumb', '$type',  '$medium', '$artist', '$mini_descr', '$price' )";		
		$result = @mysqli_query ($dbcon, $q); // Run the query.
		if ($result) { // If it ran OK.
		echo '<h2>The painting was successfully registered</h2><br>';
		} else { // If it was not registered
		// Error message:
			echo '<h2>System Error</h2>
			<p class="error">The painting could not be added due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection.
	} else { // Display the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditionals
?>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<h2>Add a Painting</h2>
<form  action="admin_add_painting.php" method="post">
<p><label class="label" for="thumb"><b>Thumbnail:</b></label>
<input id="thumb" type="text" name="thumb" size="45" maxlength="45" 
value="<?php if (isset($_POST['thumb'])) echo $_POST['thumb']; ?>">
</p>
<p><label class="label"><b>Type:</b></label>	
<select name="type" >
	<option value="">- Select -</option>
	<option value="Still-life">Still Life</option>
	<option value="Nature">Nature</option>
	<option value="Abstract">Abstract</option>
	</select><br>
<p><label class="label"><b>Medium:</b></label>
<select name="medium" >
	<option value="">- Select -</option>
	<option value="Oil-painting">Oil Painting</option>
	<option value="Colored-etching">Colored Etching</option>
</select><br>
<p><label class="label"><b>Artist:</b></label>
<select name="artist" >
	<option value="">- Select -</option>
	<option value="Adrian-W-West">Adrian W West</option>
	<option value="Roger-St-Barbe">Roger St. Barbe</option>
	<option value="James-Kessell">James Kessell</option>
</select><br>
<p><label class="label"><b>Brief Description:</b></label>
<textarea name="mini_descr" rows="3" cols="40"></textarea></p>
<p><label class="label" for="price"><b>Price:</b></label>
<input id="price" type="text" name="price" size="15" maxlength="15" 
value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">Figures only, no &pound;s, $s or commas
<!--<p><label class="label"><b>Paste PayPal code:</b></label>
<textarea name="ppcode" rows="10" cols="50"></textarea></p>-->

	<div id="submit">
	<p><input id="submit" type="submit" name="submit" value="Add"></p>
	</div>
</form><!--End of the add a painting content-->
<div>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer></div>
</div>
</div>
</body>
</html>