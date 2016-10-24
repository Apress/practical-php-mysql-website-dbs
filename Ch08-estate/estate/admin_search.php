<!doctype html>
<html lang=en>
<head>
<title>Administrator's search page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="admin_search.css">
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_admin_found.inc'); ?>
</header>
	<div id="content"><!-- Start of search page content. -->
<h2 class="center" >Search for a Record</h2>
<h3>Enter the Reference Number</h3>
<form action="view_found_record.php" method="post">
	<p><label for="ref_num"><b>Reference Number:</b></label><input id="ref_num" type="text" name="ref_num" size="30" maxlength="30" value="<?php if (isset($_POST['ref_num'])) echo $_POST['refnum']; ?>"></p>
	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form>
<!-- End of the admin search page -->
</div>
</div>	
</body>
</html>