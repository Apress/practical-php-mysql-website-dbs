<?php 
// Create a connection to the shopperdb database and define the constantst
DEFINE ('DB_USER', 'colossus');
DEFINE ('DB_PASSWORD', 'firstcomputer');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'shopperdb');
// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Make the connection:
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
// Set the encoding...
mysqli_set_charset($dbc, 'utf8');