<!doctype html>
<html lang=en>
<head>
<title>Quotes  found</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
table { background:white; color:black; }
th {padding:4px; border:1px black solid; }
#tab-navigation ul { margin-left:-167px; }

</style>
</head>
<body>
<div id='container'>
<?php include('includes/header_quotes_found.php'); ?>
<div id='content'><!--Start of the quotes found page content-->
<?php
// Start the session.
session_start() ;
// Redirect if not logged in
if ( !isset( $_SESSION[ 'member_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
// Connect to the database
require ( 'mysqli_connect.php' ) ;
//if POST is set
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$target = $_POST['target'];//Set variable
}
// Make the full text query
$q = "SELECT uname,post_date,subject,message FROM forum WHERE MATCH (message) AGAINST ( '$target') ORDER BY post_date ASC";
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
 echo '<h2>Full Text Search Results</h2><table><tr><th>Posted By</th><th>Forum</th><th id="msg">Quotation</th></tr>';
  while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
  {
    echo '<tr><td>' . $row['uname'].'<br>'.$row['post_date'].'</td>
    <td>'.$row['subject'].'</td><td>' . $row['message'] . '</td> </tr>';
  }
  echo '</table>' ;
}
else { echo '<p>There are currently no messages.</p>' ; }
mysqli_close( $dbcon ) ;
?>
</div><!--End of the quotes found page content.-->
</div>	
<?php include('includes/footer.php'); ?>
</body>
</html>