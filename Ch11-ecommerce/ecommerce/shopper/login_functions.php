<?php 
// Function for loading the URL of pages
//function load( $page = 'login.php' )
//{
  // The code for setting the page URL
//  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
  // Trim the URL
 // $url = rtrim( $url, '/\\' ) ;
//  $url .= '/' . $page ;
 //Redirect to the page and exit the script. 
//  header( "Location: $url" ) ; 
//  exit() ;
//}
// Create a function to check the email and password 
function validate( $dbcon, $e = '', $p = '')
{
  // Start an array to hold the error messages 
  $errors = array() ; 
  // Has the email address been entered?
  if ( empty( $e ) ) 
  { $errors[] = 'You forgot to enter your email address' ; 
  } 
  else  { $uname = mysqli_real_escape_string( $dbcon, trim( $e ) ) ; 
  }
  // Has the password been entered
  if ( empty( $p ) ) 
  { $errors[] = 'Enter your password.' ; 
  } 
  else { $p = mysqli_real_escape_string( $dbcon, trim( $p ) ) ; 
  }
  // If everything is OK select the buyerer_id and the buyer name from the buyers' table
  if ( empty( $errors ) ) 
  {
    $q = "SELECT buyer_id, fname, user_level FROM buyers WHERE email='$e' AND psword=SHA1('$p')" ;  
    $result = mysqli_query ( $dbcon, $q ) ;
    if ( @mysqli_num_rows( $result ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ;
      return array( true, $row ) ; 
    }
    // If the user name and password do not match the database record, create an error message
    else { $errors[] = 'The email and password do not match our records.' ; 
    }
  }
  // Retrieve the error messages
  return array( false, $errors ) ; 
}