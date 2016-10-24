<!doctype html>
<html lang=en>
<head>
<title>The Display for a pair of joined tables</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css">
<style type="text/css">
table { width:600px; background:white; color:black; border:1px black solid; border-collapse:collapse; margin:auto; }
td { border:1px black solid; padding:1px 0 1px 4px; text-align:left; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!-- Start of the view birdss page content. -->
<div id="midcol">
<h2>The Display for Two Joined Tables</h2>
<p>
<?php 
// This script retrieves all the records from the birds table
require ('mysqli_connect.php'); // Connect to the database
// Make the query:
$q = "SELECT location.location, birds.bird_name, birds.rarity, birds.best_time 
FROM location INNER JOIN birds ON location.bird_id=birds.bird_id";		
$result = @mysqli_query ($dbcon, $q); // Run the query
if ($result) { // If it ran OK, display the records
// Table header
echo '<table>
<td align="left"><b>Location</b></td>
<td align="left"><b>Bird Name</b></td>
<td align="left"><b>Rarity</b></td>
<td align="left"><b>Best Time</b></td>
</tr>';
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td align="left">' . $row['location'] . '</td>
	<td align="left">' . $row['bird_name'] . '</td>
	<td align="left">' . $row['rarity'] . '</td>
	<td align="left">' . $row['best_time'] . '</td>

	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If it did not run OK
// Message
	echo '<p class="error">The current birdss could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection
?></p>
</div></div><!-- End of the view birds page content. -->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>