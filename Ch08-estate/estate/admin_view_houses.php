<!doctype html>
<html lang=en>
<head>
<title>Admin view houses page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
p{ text-align:center; }
table { width:860px; border-collapse:collapse; }
td { padding-left:5px; padding-right:5px; }
#content h3 { text-align:center; font-size:130%; font-weight:bold; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include("includes/header_admin_found.inc"); ?>
</header>
<div id="content"><!-- Start of table display page content of  -->
<h3>Houses displayed four at a time</h3>
<p>
<?php 
// This code fetches all the records from the houses table.
require ('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4;
// Has the total number of pages already been calculated?
if (isset($_GET['p']) && is_numeric
($_GET['p'])) {//already been calculated
$pages=$_GET['p'];
}else{//use the next block of code to calculate the number of pages
//First, check for the total number of records
$q = "SELECT COUNT(ref_num) FROM houses";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$records = $row[0];
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculatethe number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows);
}else{
$pages = 1;
}
}//page check finished. Declare which record to start with
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {//already been calculated
$start = $_GET['s'];
}else{
$start = 0;
}
// Make the query:
$q = "SELECT ref_num, loctn, thumb, price, mini_descr, b_rooms, status FROM houses ORDER BY ref_num ASC LIMIT $start, $pagerows";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
//$houses = mysqli_num_rows($result);
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr>
<td><b>Ref-Num</b></td>
<td><b>Location</b></td>
<td><b>Thumb</b></td>
<td><b>Price</b></td>
<td><b>Features</b></td>
<td><b>Bedrms</b></td>
<td><b>Status</b></td>
</tr>';
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td>' . $row['ref_num'] . '</td>
	<td>' . $row['loctn'] . '</td>
	<td>  <img src='.$row['thumb'] . '></td>
	<td>' . $row['price'] . '</td>
	<td>' . $row['mini_descr'] . '</td>
	<td>' . $row['b_rooms'] . '</td>
	<td>' . $row['status'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Message:
	echo '<p class="error">The record could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/houses
$q = "SELECT COUNT(ref_num) FROM houses";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$houses = $row[0];
mysqli_close($dbcon); // Close the database connection.
echo "<p>Total found: $houses</p>";
if ($pages > 1) {
echo '<p>';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="admin_view_houses.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Previous</a> ';
}
//Create a Next link
if ($current_page != $pages) {
echo '<a href="admin_view_houses.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a> ';
}
echo '</p>';
}
?>
</div><!-- End of table display content -->
</div>
</body>
</html>