<?php   # Script 17.5 - read.php
// This page shows the messages in a thread.
include ('includes/header.html');

// Check for a thread ID...
$tid = FALSE;
if (isset($_GET['tid']) && filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) {
 
    // Create a shorthand version of the thread ID:
    $tid = $_GET['tid'];
    
    // Convert the date if the user is logged in:
    if (isset($_SESSION['user_tz'])) {
        
        $posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
        
    } else {
        
        $posted = 'p.posted_on';
        
    }
    
    // Run the query:
    $q = "SELECT t.subject, p.message, username, DATE_FORMAT($posted, '%e-%b-%y %1:%i %p') AS
    posted FROM threads AS t LEFT JOIN posts as p USING (thread_id) INNER JOIN users AS u on
    p.user_id = u.user_id WHERE t.thread_id = $tid ORDER BY p.posted_on ASC";
    
    //echo '<p>' . $q . '</p>';           // debugging display
    
    $r = mysqli_query($dbc, $q);
    
    if (!(mysqli_num_rows($r) > 0 ) ) {
        
        $tid = FALSE;   // Invalid thread ID!
        
    } // end of query validation
    
} // end of isset($_GET['tid']) IF.

if ($tid) { // get the messages in this thread...
    
    $printed = FALSE;       // flag variable.
    
    // Fetch each:
    while ($messages = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        // Only need to print the subject once!
        if (!$printed) {
            
            echo "<h2>{$messages['subject']}</h2>\n";
            $printed = TRUE;
            
        } // end of check to see if subject was already printed
        
        // Print the message:
        echo "<p>{$messages['username']} ({$messages['posted']})<br />{$messages['message']}</p><br />\n";
        
    }   // end of while loop to display the posts
    
    // Show the form to post a message:
    include ('includes/post_form.php');
    
} else {    // invalid thread id
    
    echo '<p>This page has been accessed in error.</p>';
    
} // end of if/else to get the messages in this thread

include ('includes/footer.html');

?>