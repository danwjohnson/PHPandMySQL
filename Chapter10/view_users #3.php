<?php   # Script 10.4 - view_users.php #4
// This script retrieves all the records from the users table.
// This new version paginates the query results.

$page_title = 'View the Current Users';
include ('includes/header.html');

// Page header:
echo '<h1>Registered Users</h1>';

require_once('../mysqli_connect.php');       // Connect to the db

// Number of records to show per page:
$display = 10;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) {  // Already been determined
    
    $pages = $_GET['p'];
    
} else {    // Need to be determine:
    
    // Count the number of records:
    $q = "SELECT COUNT(user_id) FROM users";
    $r = @mysqli_query($dbc, $q);
    $rows = @mysqli_fetch_array($r, MYSQLI_NUM);
    $records = $rows[0];
    
    // Calculate the number of pages...
    if ($records > $display) {  // More than one page
        
        $pages = ceil ($records/$display);
        
    } else {
        
        $pages = 1;
        
    }
    
} // end if determine pages if/else statement

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
    
    $start = $_GET['s'];
    
} else {
    
    $start = 0;
    
}

// Make the query:
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M, %d, %Y')
    AS dr, user_id FROM users ORDER BY registration_date ASC LIMIT $start,
    $display";

$r = @mysqli_query($dbc, $q);           // Run the query


// Count the number of returned rows
$num = mysqli_num_rows($r);

if ($num > 0 ) {    // If it ran ok, display the records


    // Table header.
    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr>
        <td align="left"><b>Edit</b></td>
        <td align="left"><b>Delete</b></td>
        <td align="left"><b>Last Name</b></td>
        <td align="left"><b>First Name</b></td>
        <td align="left"><b>Date Registered</b></td>
    </tr>';
    
    // Fetch and print all the records
    
    $bg = '#eeeee';     // Set the initial background color
    
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        $bg = ($bg=='#eeeee' ? '#fffff' : '#eeeee');    // Switch the bg color
        
        echo '<tr bgcolor="'. $bg .'">
            <td algin="left"><a href="edit_user.php?id=' . $row['user_id']
                . '">Edit</a></td>
            <td align="left"><a href="delete_user.php?id=' .$row['user_id']
                . '">Delete</a></td>
            <td align="left">' . $row['last_name'] . '</td>
            <td align="left">' . $row['first_name'] . '</td>
            <td align="left">' . $row['dr'] . '</td>
        </tr>';
        
    }

    
    echo '</table>';        // Close the table
    
    mysqli_free_result($r); // Free up the resources
    mysqli_close($dbc);
    
    // Make the links to other pages, if necessary.
    if ($pages > 1) {
        
        // Add some spacing and start a paragraph
        echo '<br /><p>';
        
        // Determine what page the script is on:
        $current_page = ($start/$display) + 1;
        
        // If it's not the first page, make a Previous link:
        if ($current_page != 1 ) {
            
            echo '<a href="view_users.php?s=' . ($start - $display) .
            '&p=' . $pages .'">Previous</a>';
            
        }
        
        // Make all the numbered pages:
        for ($i = 1; $i <= $pages; $i++ ) {
            
            if ($i != $current_page) {
                
                echo '<a href="view_users.php?s= ' . (($display * ($i - 1))) .
                 '&p=' . $pages . '">' . $i . '</a> ';
                
            } else {
                
                echo $i . ' ';
                
            }
            
        } // end of for loop
        
        // If it's not the last page, make a Next button
        if ($current_page != $pages) {
            
            echo '<a href="view_users.php?s=' . ($start + $display) . '&p=' .
            $pages . '">Next</a>';
            
        }
        
        echo '</p>';    // Close the paragraph
        
    } // end of the links section
    
    
} else {    // If it did not run OK.
    
    // Public message:
    echo '<p class="error">The current users could not be retrieved.  We
    apologize for any inconvience.</p>';
    
    // Debugging message:
    echo '<p>' . mysqli_error($dbc) . '<br /><br/>Query: ' . $q . '</p>';
    
}

include ('includes/footer.html');

?>