<!doctype html>
<html lang=en>
<head>
<title>The found_houses page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<!--Add conditional Javascript-->
<!--[if lte IE 8]><script src="html5.js">
</script>
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="ie8_admin.css">
<![endif]-->
<style type="text/css">
p{ text-align:center; }
table, td, th { width:900px; border-collapse:collapse; border:1px black solid; background:white;}
td, th {
	padding-left:5px; padding-right:0; text-align:center;
}
#content h3 { text-align:center; font-size:130%; font-weight:bold;
}
img { display:block;
}
#header-button { margin-top:-5px;
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include("includes/header_found_houses.inc"); ?>
<img id="rosette" alt="Rosette" title="Rosette" height="127" 
src="images/rosette-128.png" width="128">
</header>
<div id="content"><!--Start of table display page content-->
<h3>To arrange a viewing please use the the Contact Us button on the menu and<br>quote the reference number</h3>
<p>
<?php 
$loctn=$_POST['loctn'];
$price=$_POST['price'];
$type=$_POST['type'];
$b_rooms=$_POST['b_rooms'];
// This script fetches all the records from the houses table
require ('mysqli_connect.php'); // Connect to the database.
// Make the query:
$q = "SELECT ref_num, loctn, thumb, price, mini_descr, type, b_rooms, full_spec, status FROM houses WHERE loctn='$loctn' AND (price <= '$price') AND (price >= ('$price'-100000)) AND type='$type' AND b_rooms='$b_rooms'  ORDER BY ref_num ASC ";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it ran OK, display the records
// Table header
echo '<table>
<tr>
<th><b>Ref.</b></th>
<th><b>Location</b></td>
<th><b>Thumb</b></th>
<th><b>Price</b></th>
<th><b>Features</b></th>
<th><b>Bedrms</b></th>
<th><b>Details</b></th>
<th><b>Status</b></th>
</tr>';
// Fetch and display the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td>' . $row['ref_num'] . '</td>
	<td>' . $row['loctn'] . '</td>
	<td>  <img src='.$row['thumb'] . '></td>
	<td>' . $row['price'] . '</td>
	<td>' . $row['mini_descr'] . '</td>
	<td>' . $row['b_rooms'] . '</td>
	<td>' . $row['full_spec'] . '</td>
	<td>' . $row['status'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If the query did not run successfully
// Error message:
	echo '<p class="error">The record could not be retrieved. We apologize for any inconvenience.</p>';
// Debugging error message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/houses
$q = "SELECT COUNT(ref_num) FROM houses";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$houses = $row[0];
mysqli_close($dbcon); // Close the database connection.
?>
<p>No houses displayed? Either we have nothing that matches your requirements at the moment OR<br>you may have forgotten to select ALL the search fields. Please click the Home Page button and try again.</p>
</div><!--End of table display content-->
<?php include("includes/footer.inc"); ?>
</div>
</body>
</html>