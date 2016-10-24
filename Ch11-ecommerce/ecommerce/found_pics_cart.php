<?php
session_start();
if (!isset($_SESSION['user_id'])){
header('location:login.php');
exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>The page for displaying the found paintings</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
body { 	margin:auto; }
p{ text-align:center; }
table, td, th { width:930px; border-collapse:collapse; border:1px black solid; background:white;}
td, th { padding-left:5px; padding-right:5px; text-align:center; }
td.narrow, th.narrow { width:45px;}
td.descr { text-align:left; }
td.medium, th.medium { width:100px;}
td.artist, th.artist { width:210px;}
td.thumb, th.thumb { width:125px; text-align:center;}
#content h3 { text-align:center; font-size:130%; font-weight:bold;}
img { display:block;}
#header-button { margin-top:-5px;}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_found_pics_cart.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
	</div>
</header>
<div id="content"><!--Start of table displaying selected paintings-->
<h3>To buy a painting please click its Add to Cart link</h3>
<p>
<?php
//Connect to the database
require ( 'mysqli_connect.php' ) ;
// Select the first thre items items from the art table
$q = "SELECT * FROM art LIMIT 3";
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
// Table header
echo '<table>
<tr>
<th class="thumb"><b>Thumb</b></th>
<th class="narrow"><b>Type</b></th>
<th class="medium"><b>Medium</b></th>
<th class="artist"><b>Artist</b></th>
<th class="descr"><b>Details</b></th>
<th class="narrow"><b>Price &pound;</b></th>
</tr>';
// Fetch the matching records and populate the table display
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td class="thumb"><img src='.$row['thumb'] . '></td>
	<td class="narrow">' . $row['type'] . '</td>
	<td class="medium">' . $row['medium'] . '</td>
	<td class="artist">' . $row['artist'] . '</td>
	<td class="descr">' . $row['mini_descr'] . '</td>
	<td class="artist">' . $row['price'] . 
	'<br><a href="added.php?id=' . $row['art_id'] . '">Add to Cart</a></td>
	</tr>';
	}
	echo '</table>'; // End of table
// Close the database connection.
  mysqli_close( $dbcon ) ; 
}
// Or notify the user that no matching paintings were found
else { echo '<p>There are currently no items matching your search criteria.</p>' ; }
?>
<p>No paintings displayed? Either we have nothing that matches your requirements at the moment OR<br>you may have forgotten to select 
BOTH the search fields. Please click the Home Page button and try again.</p>
</div><!--End of table display content-->
<?php include("includes/footer.inc"); ?>
</div>
</body>
</html>