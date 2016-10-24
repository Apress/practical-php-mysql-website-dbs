<!doctype html>
<html lang=en>
<head>
<title>View a member’s postings</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
table { background:white; color:black; }
th {padding:4px; border:1px black solid; }
#tab-navigation ul { margin-left:-107px; }
</style>
</head>
<body>
<div id='container'>
<?php
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) ) 
{ require ( 'login_functions.php' ) ; load() ; }
include ( 'includes/header_your_posts.php' ) ;
// Connect to the database
require ( 'mysqli_connect.php' ) ;
// Make the query
$q = "SELECT uname,post_date,subject,message FROM forum WHERE uname = '{$_SESSION['uname']}' ORDER BY post_date ASC";
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
  
  echo '<h2>Your Postings</h2><table><tr><th>Posted By</th><th>Forum</th><th id="msg">Quotation</th></tr>';
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
</div>
<?php include ( 'includes/footer.php' ) ; ?>
</body>
</html>