<?php
# Connect  on 'localhost' for user 'turing' using password 'computerman' and database 'shopdb'
$dbcon = @mysqli_connect ( 'localhost', 'turing', 'computerman', 'shopdb' )
# If it fails 
OR die ( mysqli_connect_error() ) ;
# Set the encoding
mysqli_set_charset( $dbcon, 'utf8' ) ;