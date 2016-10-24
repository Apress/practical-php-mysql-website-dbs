<!doctype html>
<html lang=en>
<head>
<title>Home page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
table { background:white; color:black; }
th {padding:4px; border:1px black solid; }
#tab-navigation ul { margin-left:95px; }
h2 { margin-bottom:0; margin-top:10px; }
h3 {margin-bottom:0; margin-top:0; }
</style>
</head>
<body>
<div id='container'>
<?php include ( 'includes/header.php' ) ;?>
<h2>This home page shows a selection from our large collection of quotations</h2>
<h2>To view the whole collection, please register.</h2><br>
<h3>You will then be able to contribute to this message board by adding quotations.</h3>
<?php
// Connect to the database
require ( 'mysqli_connect.php' ) ;
// Make the query
$q = "SELECT uname,post_date, subject, message FROM forum LIMIT 5" ;
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
  echo '<br><table><tr><th>Posted By</th><th>Subject</th><th id="msg">Message</th></tr>';
  while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
  {
    echo '<tr><td>' . $row['uname'].'<br>'.$row['post_date'].'</td>
    <td>'.$row['subject'].'</td><td>' . $row['message'] . '</td> </tr>';
  }
  echo '</table>' ;
}
else { echo '<p>There are currently no messages.</p>' ; }
mysqli_close( $dbcon ) ;
include ( 'includes/footer.php' ) ;
?>
</div>
</body>
</html>