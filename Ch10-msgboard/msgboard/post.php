<?php 
session_start() ;
// Redirect user if he is not logged in
if ( !isset( $_SESSION[ 'member_id' ] ) ) { 
require ( 'login_functions.php' ) ; 
load() ; 
}
?>
<!doctype html>
<html lang=en>
<head>
<title>The form for posting messages</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
#tab-navigation ul { margin-left:85px; }
form { padding-left:215px; }
</style>
</head>
<body>
<div id='container'>
<?php // The form for posting messages
include ( 'includes/header_post.php' ) ;
echo '<h2>Post a Quotation</h2>';
// Display the form fields
echo '<form action="process_post.php" method="post" accept-charset="utf-8">
<p>Choose the Subject: <select name="subject">
<option value="Comical Quotes">Comical Quotes</option>
<option value="Wise Quotes">Wise Quotes</option>
</select></p>
<p>Message:<br><textarea name="message" rows="5" cols="50"></textarea></p>
<p><input name="submit" type="submit" value="post"></p>
</form>';
include ( 'includes/footer.php' ) ;
//posting an entry into the database table automaticlally sends a message to the forum moderator 
// Assign the subject
$subject = "Posting added to message board";
$user = isset($_SESSION['uname']) ? $_SESSION['uname'] : "";
$body = "Posting added by " . $user;
mail("admin@myisp.co.uk", $subject, $body, "From:admin@myisp.co.uk\r\n");?>
</div>
</body>
</html>