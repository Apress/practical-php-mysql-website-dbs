<!doctype html>
<html lang=en>
<head>
<title>Checkout page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<!--<link rel="stylesheet" type="text/css" href="shopper.css">-->
<style type="text/css">
#content h2 { width:60px; margin-left:-40px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
form { 	margin-left:130px; }
.submit { margin-left:215px; }
.cntr { text-align:center; margin-left:20px; }
h3.checkout {
	margin-left:160px; margin-bottom:0;
}
#thanks h2 {margin-left:-290px;
	width:700px;
}
#rightcol {
	height:180px;
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_checkout.inc'); ?>
<div id="logo">
	<img alt="dove" height="170" src="images/dove-1.png" width="234">
</div>
</header><div id="content"><!-- Start of the login page content. -->
<div id="rightcol">
	<nav>
	<?php include('includes/menu.inc'); ?>
	</nav>
</div>
<?php
//Start the session.
session_start() ;
// Redirect the user if he is not logged in
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
// Confirm that the total and cart have been passed to this page
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
 // Connect to the database
require ( 'mysqli_connect.php' ) ;
  // Insert the user's id, the total, and the order date into the orders table
  $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
  $result = mysqli_query ($dbcon, $q);
  //Get the order number
  $order_id = mysqli_insert_id($dbcon);
  // Get the selected paintings from the art table
  $q = "SELECT * FROM art WHERE 'art_id' IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY price ASC';
  $result = mysqli_query ($dbcon, $q);
// Insert the order contents into the order_contents table
  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO order_contents ( order_id, art_id, quantity, price )
    VALUES ( $order_id, ".$row['art_id'].",".$_SESSION['cart'][$row['art_id']]['quantity'].",".$_SESSION['cart'][$row['art_id']]['price'].")" ;
    $result = mysqli_query($dbcon,$query);
  }
  // Close the database connection
  mysqli_close($dbcon);
  // Display a thank you message and state the order number
  echo "<p>Thanks for your order. Your Order Number Is #".$order_id."</p>";
  // Empty the cart ready for the next customer 
  $_SESSION['cart'] = NULL;
}
// Display a message
//else { echo '<h3 class="checkout">The shopping cart has been emptied ready for the next customer.</h3>' ; }
?>
<br>
<div id="thanks">
<h2>Thank you for your order. Your order number is 1906.</h2>
</div>
<h3 class="checkout">The shopping cart has been emptied ready for your next 
transaction.</h3>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer>
</div>
</div>	
</body>
</html>