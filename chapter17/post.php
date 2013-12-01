<?php   # Script 17.7 - post.php

// This page handles the message post.
// It also displays the form is creating a new thread

include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Handle the form
    
    // Language ID is in the session.
    // Validate the thread ID ($tid), which may not be present:
    if (isset($_POST['tid']) && filter_var($_POST['tid'], FILTER_VALIDATE_INT,
        array('min_range' => 1)) ) {
        
        $tid = $_POST['tid'];
        
    } else {
        
        $tid = FALSE;
        
    } // end of thread_id validation
    
    
    // If there's no thread ID, a subject must be provided:
    if (!$tid && empty($_POST['subject'])) {
        
        echo '<p>Please enter a subject for this post.</p>';
        
    } elseif (!$tid && !empty($_POST['subject'])){
        
        $subject = htmlspecialchars(strip_tags($_POST['subject']));
        
    } else {    // Thread ID, no need for subject
        
        $subject = TRUE;
        
    } // end of subject validation
    
    
    // Validate the body:
    if (!empty($_POST['body'])) {
        
        $body = htmlentities($_POST['body']);
        
    } else {
        
        $body = FALSE;
        echo '<p>Please enter a body for this post.</p>';
        
    } // end of body validation
    
    
    if ($subject && $body) {    // OK!
        
        // Add the message to the database
        if (!$tid) {    // Create a new thread
            
            $q = "INSERT INTO threads (lang_id, user_id, subject) VALUES ({$_SESSION['lid']},
            {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $subject) . "')";
            
            //echo '<p>' . $q . '</p>';           // debugging message to display query.
            
            $r = mysqli_query($dbc, $q);
            
            if (mysqli_affected_rows($dbc) == 1) {
                
                $tid = mysqli_insert_id($dbc);
                
            } else {
                
                echo '<p>Your post could not be handled due to a system error.</p>';
                
            }  // check if post was successfully inserted into the database
            
        } // no $tid
        
        
        if ($tid) { // Add this to the replies table
            
            $q = "INSERT INTO posts (thread_id, user_id, message, posted_on) VALUES
            ($tid, {$_SESSION['user_id']}, '" .mysqli_real_escape_string($dbc, $body) . "',
            UTC_TIMESTAMP())";
            
            $r = mysqli_query($dbc, $q);
            
            //echo '<p>' . $q . '</p>';           // debugging message to display query.

            
            if (mysqli_affected_rows($dbc) == 1) {
                
                echo '<p>Your post has been entered.</p>';
                
            } else {
                
                echo '<p>Your post could not be handled due to a system error.</p>';
                
            }
            
        }  // end of valid $tid
        
    } else {    // Include the form
        
        include ('includes/post_form.php');
        
    }
    
} else {    // Display the form
    
    include ('includes/post_form.php');
    
}

include ('includes/footer.html');

?>