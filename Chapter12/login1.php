<?php   # Script 12.3 - login.php

// This page process the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHNG to the web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    // For processing the login:
    require ('includes/login_functions.inc.php');
    
    // Need the database connection:
    require ('../mysqli_connect.php');
    
    // Check the login:
    list ($check,$data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    
    if ($check) {   // OK!
        
        // Set the cookie
        setcookie ('user_id', $data['user_id']);
        setcookie ('first_name', $data['first_name']);
        
        // Redirect:
        redirect_user('loggedin.php');
        
    } else {    // Unsuccesssful!
        
        // Assign $data to $errors for error reporting
        // in the login_page.inc.php file.
        $errors = $datat;
        
    }
    
    mysqli_close($dbc);         // Closse the database connection.
    
} // End of the main submit conditional

// Create the page
include ('includes/login_page.inc.php');

?>