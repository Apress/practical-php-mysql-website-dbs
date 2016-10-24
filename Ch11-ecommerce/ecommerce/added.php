<?php 
# Start the session.
session_start() ;
# Redirect the user if he is not logged in
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!doctype html>
<html lang=en>
<head>
<title>The confirmation page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
body { 	margin:auto; }
p{ text-align:center; }
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
<div id="content"><!--Start of confirmation page-->
<p>
<?php
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 
// Connect to the database
require ( 'mysqli_connect.php' ) ;
// Get selected painting data from the  'art' table 
$q = "SELECT * FROM art WHERE art_id = $id" ;
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) == 1 )
{
  $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
 // If the cart already contains one of those products
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
    // Add another one of those paintings
    $_SESSION['cart'][$id]['quantity']++; 
    echo '<h3>Another one of those paintings has been added to your cart</h3>';
  } 
  else
  {
    // Add a different painting
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['price'] ) ;
    echo '<h3>A painting has been added to your cart</h3>' ;
  }
}
// Close the database connection
mysqli_close($dbcon);
// Insert three lnks
echo '<p><a href="found_pics_cart.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a></p>' ;
?>
</div><!--End of confirmation page content-->
<?php include("includes/footer.inc"); ?>
</div>
</body>
</html>