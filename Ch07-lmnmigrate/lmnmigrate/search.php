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
<title>Search page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
h3.red { color:red; font-size:105%; font-weight:bold; text-align:center;}
</style>
</head>
<body>
<div id="container">
<?php include("includes/header-admin.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
	<div id="content"><!-- Start of search page content. -->
<h2>Search for a Record</h2>
<h3 class="red">Both Names are required items</h3>
<form action="view_found_record.php" method="post">
	<p><label class="label" for="fname">First Name:</label><input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
	<p><label class="label" for="lname">Last Name:</label><input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form>
<?php include ('includes/footer.php'); ?>
<!-- End of the search page content -->
</div>
</div>	
</body>
</html>