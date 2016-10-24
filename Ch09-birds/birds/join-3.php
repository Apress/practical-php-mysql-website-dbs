<!doctype html>
<html lang=en>
<head>
<title>Display three joined tables</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css">
<style type="text/css">
table { width:700px; background:white; border:1px black solid; border-collapse:collapse; margin:auto; }
td { border:1px black solid; padding:1px 0 1px 4px; text-align:left; color:black; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!-- Start of content of the display three tables page -->
<div id="midcol">
<h2>The Display for Three Joined Tables</h2>
<p>
<?php 
// This script retrieves records from the three tables
require ('mysqli_connect.php'); // Connect to the database
// Make the query:
$q = "SELECT bird_name, best_time, location, bird_hides, entr_memb, entr_n_memb 
FROM birds 
INNER JOIN location USING (bird_id) 
INNER JOIN rsv_info USING (location_id)";		
$result = @mysqli_query ($dbcon, $q); // Run the query
if ($result) { // If it ran OK, display the records
// Table header
echo '<table>
<td align="left"><b>Birds Name</b></td>
<td align="left"><b>Best Time</b></td>
<td align="left"><b>Location</b></td>
<td align="left"><b>Bird Hides</b></td>
<td align="left"><b>Entrance-Member</b></td>
<td align="left"><b>Entrance Non-Member</b></td>
</tr>';
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td align="left">' . $row['bird_name'] . '</td>
	<td align="left">' . $row['best_time'] . '</td>
	<td align="left">' . $row['location'] . '</td>
	<td align="left">' . $row['bird_hides'] . '</td>
	<td align="left">' . $row['entr_memb'] . '</td>
	<td align="left">' . $row['entr_n_memb'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If it did not run OK
// Message
	echo '<p class="error">The current data could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection
?></p>
</div></div><!-- End of the view three tables content -->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>