<!doctype html>
<html lang=en>
<head>
<title>View the location page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
table { width:500px; background:white; color:black; border:1px black solid; border-collapse:collapse; margin:auto; }
td { border:1px black solid; padding:1px 0 1px 4px; text-align:left; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!-- Start of the view location page content. -->
<div id="midcol">
<h2>The Devon Bird Reserves</h2>
<p>
<?php 
// This script retrieves all the records from the location table
require ('mysqli_connect.php'); // Connect to the database
// Make the query:
$q = "SELECT location, location_type FROM location ORDER BY location_id ASC";		
$result = @mysqli_query ($dbcon, $q); // Run the query
if ($result) { // If it ran OK, display the records
// Table header
echo '<table>
<td align="left"><b>Location</b></td>
<td align="left"><b>Location type</b></td>
</tr>';
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td align="left">' . $row['location'] . '</td>
	<td align="left">' . $row['location_type'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If it did not run OK
// Message
	echo '<p class="error">The current location could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
?></p>
</div></div><!-- End of the view location page content. -->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>