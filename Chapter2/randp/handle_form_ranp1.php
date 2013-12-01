<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tranisitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form Feedback</title>
    <style type="text/css" title="text/css" media="all">
    .error {
        font-weight: bold;
        color: #C00;
    }
    </style>
</head>
<body>
<?php # Script 2.4 - modified for the Review and Pursue section

// Validate the name
if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = NULL;
    echo '<p class="error">You forgot to enter your name!</p>';
} // end of if/else to validate the name field


// Validate the email
if (!empty($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    $email = NULL;
    echo '<p class="error">You forgot to enter your email!</p>';
} // end of if/else to validate the email field


// Validate the comments
if (!empty($_REQUEST['comments'])) {
    $comments = $_REQUEST['comments'];
} else {
    $comments = NULL;
    echo '<p class="error">You forgot to enter your comments!</p>';
} // end of if/else to validate the comments field


// Validate the gender
// Modified for the Review and Pursue section to put it into one conditional instead of nested.
if (isset($_REQUEST['gender']) && ($_REQUEST['gender'] == 'M') ){
    
    echo '<p><b>Good day, Sir!</b></p>';
    
} elseif (isset($_REQUEST['gender']) && ($_REQUEST['gender'] == 'F') ) {  

    echo '<p><b>Good day, Madam!</b></p>';

} else {
    
    echo '<p class="error">You forgot to select gender!</p>';
    
}

// If everything is OK, print the message:
if ($name && $email && $gender && $comments) {
    
    echo "<p>Thanks you, <b>$name</b>, for the following comments:<br />
    <tt>$comments</tt></p>
    <p>We will reply to you at <i>$email</i>.</p>\n";
}else { // Missing form value.
    echo '<p class="error">Please go back and fill out the form again.</p>';
} // end of if/else to validate that all required fields were filled out.

?>

</body>

</html>