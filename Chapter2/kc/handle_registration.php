<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tranisitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registration</title>
</head>
<body>
<?php   # This script handles the registration of the user to the site.

// Print the submitted information
if ( !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email']) &&
     !empty($_POST['phone']) && !empty($_POST['addr1']) &&
     !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']) ){
    echo "<p>Thank you, <b>{$_POST['first']}</b>, for the registering for this site.<br /></p>
    <p>We will send you a confirmation email at: <i>{$_POST['email']}</i></p>\n";
} else {    // Missing form value
    echo '<p>Please go back and fill out the form again.</p>';
}

?>

</body>

</html>