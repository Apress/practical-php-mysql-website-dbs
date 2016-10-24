<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Location Header</title>
</head>
<body>

<?php

if ( isset( $_POST['id']  ) )
{
  $id = $_POST['id'] ;
   if( $id== 123 ) 
  { 
    session_start() ;
	$_SESSION['id'] = $id ;
    header( 'Location: location.php' ) ; 
	exit() ;
  }
  else
 {
  echo "<p>$id is an incorrect ID!</p>" ;
  }
}

echo '
<form action="header.php" method="POST">
<fieldset>
<legend>Enter Your User ID</legend>
<p>ID : <input type="text" name="id"></p>
</fieldset>
<input type="submit">
</form> ' ;


?>

</body>
</html>