<!doctype html>
<html lang=en>
<head>
<title>Login page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
h2 { color:navy; }
#tab-navigation ul { margin-left:140px; }
form { padding-left:295px; }
.label { width:80px; float:left; text-align:right;}
form p { width:250px; }
p.submit {margin-left:86px; }
</style>
</head>
<body>
<div id='container'>
<?php
include ( 'includes/header_login.php' ) ;
// Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">A problem occurred:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="safer-register-page.php">Register</a></p>' ;
}
?>
<!-- Display the login form fields -->
<h2>Login</h2>
<form action="process_login.php" method="post">
<p><label class="label" for="uname">User Name:</label><input id="uname" type="text" 
name="uname" size="16" maxlength="16" value="<?php if (isset($_POST['uname']))
echo $_POST['uname']; ?>"></p>
<p><label class="label" for="psword">Password:</label><input id="psword" 
type="password" name="psword" size="16" maxlength="16" value="<?php if
(isset($_POST['psword'])) echo $_POST['psword']; ?>" ></p>
<p class="submit"><input type="submit" value="Login" ></p>
</form>
<?php 
include ( 'includes/footer.php' ) ; 
?>
</div>
</body>
</html>