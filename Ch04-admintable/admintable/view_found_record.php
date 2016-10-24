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
<title>View found record page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; }
</style>
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of the page-specific content. -->
<h2>Search Result</h2>
<?php 
// This script retrieves records from the users table.
require ('mysqli_connect.php'); // Connect to the db.
echo '<p>If no record is shown, this is because you had an incorrect or missing entry in the search form.<br>Click the back button on the browser and try again</p>';
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$lname = mysqli_real_escape_string($dbcon, $lname);
//require ('mysqli_connect.php'); // Connect to the database.
$q = "SELECT lname, fname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id FROM users WHERE lname='$lname' AND fname='$fname' ORDER BY registration_date ASC ";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it ran, display the records.
// Table header.
echo '<table>
<tr><td><b>Edit</b></td>
<td><b>Delete</b></td>
<td><b>Last Name</b></td>
<td><b>First Name</b></td>
<td><b>Email</b></td>
<td><b>Date Registered</b></td>
</tr>';
// Fetch and display the records:
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
	echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/members.
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$members = $row[0];
mysqli_close($dbcon); // Close the database connection.
echo "<p>Total membership: $members</p>";
?>
</div><!-- End of administration page content. -->
<?php include("footer.php"); ?>
</div>
</body>
</html>