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
<title>Admin view users title</title>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; }
table { width:800px; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header-admin.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!--Start of table display page content-->
<h2>Registered members displayed four at-a-time</h2>
<p>
<?php 
// This script fetches all the records from the users table
require ('mysqli_connect.php'); // Connect to the database
//set the number of rows displayed per page
$pagerows = 4;
// Has the total number of pagess already been calculated?
if (isset($_GET['p']) && is_numeric
($_GET['p'])) {//Already been calculated
$pages=$_GET['p'];
}else{//The next block of code to calculates the number of pages
//First, check for the total number of records
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$records = $row[0];
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculate the number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows);
}else{
$pages = 1;
}
}//Page check finished
//Declare which record to start with
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {
$start = $_GET['s'];
}else{
$start = 0;
}
// Make the query
$q = "SELECT title, lname, fname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, paid, user_id FROM users ORDER BY registration_date DESC LIMIT $start, $pagerows";		
$result = @mysqli_query ($dbcon, $q); 
$members = mysqli_num_rows($result);
if ($result) { // If the query ran OK, display the records
// Table header.
echo '<table>
<tr><td><b>Edit</b></td>
<td><b>Delete</b></td>
<td><b>Title</b></td>
<td><b>Last Name</b></td>
<td><b>First Name</b></td>
<td><b>Email</b></td>
<td><b>Date Registered</b></td>
<td><b>Paid</b></td>
</tr>';
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td><a href="edit_record.php?id=' . $row['user_id'] . '">Edit</a></td>
	<td><a href="delete_record.php?id=' . $row['user_id'] . '">Delete</a></td>
	<td>' . $row['title'] . '</td>
	<td>' . $row['lname'] . '</td>
	<td>' . $row['fname'] . '</td>
	<td>' . $row['email'] . '</td>
	<td>' . $row['regdat'] . '</td>
	<td>' . $row['paid'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If the query did not run OK, display an error message
	echo '<p class="error">The current record could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/members
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$members = $row[0];
mysqli_close($dbcon); // Close the database connection
echo "<p>Total membership: $members</p>";
if ($pages > 1) {
echo '<p>';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="admin_view_users_title.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Previous</a> ';
}
//Create a Next link
if ($current_page != $pages) {
echo '<a href="admin_view_users_title.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a> ';
}
echo '</p>';
}
?>
</div><!--End of table display content-->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>