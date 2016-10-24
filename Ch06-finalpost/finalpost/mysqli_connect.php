<?php 
// This creates a connection to the logindb database and to MySQL, 
// It also sets the encoding.
// Set the access details as constants:
DEFINE ('DB_USER', 'cabbage');
DEFINE ('DB_PASSWORD', 'in4aPin4aL');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'finalpost');

// Make the connection:
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbcon, 'utf8');