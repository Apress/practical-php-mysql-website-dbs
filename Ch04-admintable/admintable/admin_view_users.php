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
<title>Admin view users page for an administrator</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; 
}
</style>
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of table display page content of  -->
<h2>Registered members displayed four at-a-time</h2>
<p>
<?php 
// This script retrieves all the records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4;
// Has the total number of pagess already been calculated?
if (isset($_GET['p']) && is_numeric
($_GET['p'])) {//already been calculated
$pages=$_GET['p'];
}else{//use the next block of code to calculate the number of pages
//First, check for the total number of records
$q = "SELECT COUNT(user_id) FROM users";
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
}//page check finished
//Decalre which record to start with
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {//already been calculated
$start = $_GET['s'];
}else{
$start = 0;
}
// Make the query:
$q = "SELECT lname, fname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $pagerows";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
$members = mysqli_num_rows($result);
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr><td><b>Edit</b></td>
<td><b>Delete</b></td>
<td><b>Last Name</b></td>
<td><b>First Name</b></td>
<td><b>Email</b></td>
<td><b>Date Registered</b></td>
</tr>';
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td><a href="edit_record.php?id=' . $row['user_id'] . '">Edit</a></td>
	<td><a href="delete_record.php?id=' . $row['user_id'] . '">Delete</a></td>
	<td>' . $row['lname'] . '</td>
	<td>' . $row['fname'] . '</td>
	<td>' . $row['email'] . '</td>
	<td>' . $row['regdat'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="error">The current record could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/members.
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$members = $row[0];
mysqli_close($dbcon); // Close the database connection.
echo "<p>Total membership: $members</p>";
if ($pages > 1) {
echo '<p>';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="admin_view_users.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Previous</a> ';
}
//Create a Next link
if ($current_page != $pages) {
echo '<a href="admin_view_users.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a> ';
}
echo '</p>';
}
?>
</div><!-- End of table display content -->
<?php include("footer.php"); ?>
</div>
</body>
</html>