<!doctype html>
<html lang=en>
<head>
<title>Registration page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="admin_form.css">
<style type="text/css">
#midcol h2 { margin-left:-15px; }
form { 	margin-left:150px; }
#submit { margin-left:215px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_reg.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
</div>
</header>
<div id="content"><!-- Start of the registration page content. -->
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<?php
require ('mysqli_connect.php'); // Connect to the database
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an errors array
// Trim the title
$tle = trim($_POST['title']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($tle));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your title.';
}else{
$title = $stripped;
}
// Trim the first name
$name = trim($_POST['fname']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($name));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your first name.';
}else{
$fn = $stripped;
}
// Trim the last name
$lnme = trim($_POST['lname']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($lnme));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your last name.';
}else{
$ln = $stripped;
}
//Set the email variable to FALSE
$e = FALSE;									
// Check that an email address has been entered				
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
}
//remove spaces from beginning and end of the email address and validate it	
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
// Trim the first address
$add1 = trim($_POST['addr1']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($add1));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your address.';
}else{
	$ad1 = $stripped;
}
// Trim the second address
$ad2 = trim($_POST['addr2']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($ad2));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $ad2=$ad2;
}else{
$ad2 = $stripped;
}
// Trim the city
$ct = trim($_POST['city']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($ct));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your city.';
}else{
$cty = $stripped;
}
// Trim the county
$conty = trim($_POST['county']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($conty));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your county.';
}else{
$cnty = $stripped;
}
// Trim the post code
$pcod = trim($_POST['pcode']);
// Strip HTML and apply escaping
$stripped = mysqli_real_escape_string($dbcon, strip_tags($pcod));
// Get string lengths
$strlen = mb_strlen($stripped, 'utf8');
// Check stripped string
if( $strlen < 1 ) {
    $errors[] = 'You forgot to enter your county.';
}else{
$pcode = $stripped;
}
// Has a phone number been entered?	
if (empty($_POST['phone'])){
$ph=($_POST['phone']);
}
elseif (!empty($_POST['phone'])) {			
//Remove spaces, hyphens, letters and brackets
$phone = preg_replace('/\D+/', '', ($_POST['phone']));
$ph=$phone;
}
if (empty($errors)) { // If everything's OK
	// Register the user in the database
		// Make the query
		$q = "INSERT INTO buyers (buyer_id, title, fname, lname, email, psword, addr1, addr2, city, county, pcode, phone) VALUES (' ', '$title', '$fn', '$ln', '$e', SHA1('$p'), '$ad1', '$ad2', '$cty', '$cnty', '$pcode', '$ph' )";		
		$result = @mysqli_query ($dbcon, $q); // Run the query
		if ($result) { // If it ran OK
		header ("location: register-thanks.php"); 
		exit();
		} else { // If it did not run OK
		// Message
			echo '<h2>System Error</h2>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
		// Include the footer and quit the script
		include ('includes/footer.inc'); 
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
<h2>Account Registration</h2>
		<h3 class="content">Items marked with an asterisk * are essential</h3>
<form action="register.php" method="post">
	<label class="label" for="title">Title*</label><input id="title" type="text" name="title" size="15" maxlength="12" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
	<br><label class="label" for="fname">First Name*</label><input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
	<br><label class="label" for="lname">Last Name*</label><input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
	<br><label class="label" for="email">Email Address*</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
	<br><label class="label" for="psword1">Password*</label><input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp;8 
	to 12 characters
	<br><label class="label" for="psword2">Confirm Password*</label><input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" >
	<br>
	<label class="label" for="addr1">Address*</label><input id="addr1" type="text" name="addr1" size="30" maxlength="30" value="<?php if (isset($_POST['addr1'])) echo $_POST['addr1']; ?>">
	<br><label class="label" for="addr2">Address</label><input id="addr2" type="text" name="addr2" size="30" maxlength="30" value="<?php if (isset($_POST['addr2'])) echo $_POST['addr2']; ?>">
	<br><label class="label" for="city">City*</label><input id="city" type="text" name="city" size="30" maxlength="30" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">
	<br><label class="label" for="county">County*</label><input id="county" type="text" name="county" size="30" maxlength="30" value="<?php if (isset($_POST['county'])) echo $_POST['county']; ?>">
	<br><label class="label" for="pcode">Post Code*</label><input id="pcode" type="text" name="pcode" size="15" maxlength="15" value="<?php if (isset($_POST['pcode'])) echo $_POST['pcode']; ?>">
	<br><label class="label" for="phone">Telephone</label><input id="phone" type="text" name="phone" size="30" maxlength="30" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
	
	<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</div>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer>
</div>
</div>
<div>
</div>
</body>
</html>