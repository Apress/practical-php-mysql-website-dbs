<?php # CONNECT TO MySQL DATABASE.

require( 'connect_db.php' ) ;

# Function to create and execute a MySQL query.
function show_records( $dbcon )
{
  $q = 'SELECT * FROM watches' ;
  $result = mysqli_query( $dbcon , $q ) ;
  $num = mysqli_num_rows( $result ) ;
   if ( $num > 0 )
  {
      echo '<h1>Records in watches table</h1> ' ;
      while ( $row = mysqli_fetch_array( $r , MYSQLI_ASSOC ) ) 
     {
       echo '<br>' . $row['model'] . ' | ' . $row[ 'style' ] .  ' @ ' . $row[ 'price' ] ;
      }
  } else { echo '<p>' . mysqli_error( $dbc ) . '</p>'  ; }
}
# Call the function.
show_records($dbcon) ;
  
# Create and execute another MySQL query.
$q = 'UPDATE watches SET style = "Gents" WHERE style = "Ladies"  ' ;
$result = mysqli_query( $dbcon , $q ) ;

# Call the function again if 2 records updated.
if(  mysqli_affected_rows( $dbcon ) == 2 ) 
{ 
  echo '<hr>' . mysqli_affected_rows( $dbcon ) . ' Records Updated...' ; 
  show_records($dbc) ;
 } 

# Close the connection.
mysqli_close( $dbcon ) ;
