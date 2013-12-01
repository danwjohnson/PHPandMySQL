<?php   # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the databse access information as constants:
DEFINE ('DB_USER', 'phpusr');
DEFINE ('DB_PASSWORD', 'phpusr');
DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'ch18');

// Make the connection
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// If no connection could be made, trigger an error:
if (!$dbc) {
    
    trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
    
} else {
    
    mysqli_set_charset($dbc, 'ut8');
    
}


