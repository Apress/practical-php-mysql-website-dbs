<?php 
// Function for loading the URL of pages
function load( $page = 'login.php' )
{
  // The code for setting the page URL
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
  // Trim the URL
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;
 //Redirect to the page and exit the script. 
  header( "Location: $url" ) ; 
  exit() ;
}
// Create a function to check user name and password 
function validate( $dbcon, $uname = '', $p = '')
{
  // Initiate the array to hold the error messages 
  $errors = array() ; 
  // Has the user name been entered?
  if ( empty( $uname ) ) 
  { $errors[] = 'You forgot to enter your user name' ; 
  } 
  else  { $uname = mysqli_real_escape_string( $dbcon, trim( $uname ) ) ; 
  }
  // Has the password been entered
  if ( empty( $p ) ) 
  { $errors[] = 'Enter your password.' ; 
  } 
  else { $p = mysqli_real_escape_string( $dbcon, trim( $p ) ) ; 
  }
  // If everything is OK select the member_id and the user name from the members' table
  if ( empty( $errors ) ) 
  {
    $q = "SELECT member_id, uname FROM members WHERE uname='$uname' AND psword=SHA1('$p')" ;  
    $result = mysqli_query ( $dbcon, $q ) ;
    if ( @mysqli_num_rows( $result ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ;
      return array( true, $row ) ; 
    }
    // If the user name and password do not match the database record, create an error message
    else { $errors[] = 'The user name and password do not match our records.' ; 
    }
  }
  // Retrieve the error messages
  return array( false, $errors ) ; 
}