<?php   # Script 12.12 - login.php #4

// This page process the login form submission.
// The script now uses sessions.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    // For processing the login:
    require ('includes/login_functions.inc.php');
    
    // Need the database connection:
    require ('../mysqli_connect.php');
    
    // Check the login:
    list ($check,$data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    
    if ($check) {   // OK!
        
        // Set the session data
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        
        // Store the HTTP_USER_AGENT:
        $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
        
        
        // Redirect:
        redirect_user('loggedin.php');
        
    } else {    // Unsuccesssful!
        
        // Assign $data to $errors for error reporting
        // in the login_page.inc.php file.
        $errors = $datat;
        
    }
    
    mysqli_close($dbc);         // Close the database connection.
    
} // End of the main submit conditional

// Create the page
include ('includes/login_page.inc.php');

?>