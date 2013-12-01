<?php   # Script 12.13 - loggedin.php #3

// The user is redirected here from login.php

session_start();

// If no cookie is present, redirect the user:
// Also validate the HTTP_USER_AGENT
if (!isset($_SESSION['user_id']) OR
    ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
    
    // Need the functions:
    require ('includes/login_functions.inc.php');
    redirect_user();
    
}

// Set the page title and include the HTML header:
$page_title = "Logged In!";
include('includes/header.html');

// Print a customized message:
echo "<h1>Logged In!</h1><p>Your are now logged in,
{$_SESSION['first_name']}!</p>
<p><a href=\"logout.php\">Logout</a></p>";

include('includes/foooter.html');

?>