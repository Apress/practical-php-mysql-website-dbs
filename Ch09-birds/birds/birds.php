<!doctype html>
<html lang=en>
<head>
<title>View birds page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css">
<style type="text/css">
table { width:500px; background:white; color:black; border:1px black solid; border-collapse:collapse; margin:auto;
}
td { border:1px black solid; padding:1px 0 1px 4px; text-align:left;
}
</style>
</head>
<body>
<div id="container">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!-- Start of the view birds page content. -->
<div id="midcol">
<h2>The Birds that can be seen on our Reserves</h2>
<p>
<?php 
// This script retrieves all the records from the birds table
require ('mysqli_connect.php'); // Connect to the database
// Make the query:
$q = "SELECT bird_name, rarity, best_time FROM birds ORDER BY bird_name ASC";		
$result = @mysqli_query ($dbcon, $q); // Run the query
if ($result) { // If it ran OK, display the records
// Table header
echo '<table>
<td align="left"><b>Birds Name</b></td>
<td align="left"><b>Rarity</b></td>
<td align="left"><b>Best Time</b></td>
</tr>';
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td align="left">' . $row['bird_name'] . '</td>
	<td align="left">' . $row['rarity'] . '</td>
	<td align="left">' . $row['best_time'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If it did not run OK
// Message
	echo '<p class="error">The current birds could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
?></p>
</div></div><!-- End of the view birds page content. -->
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>