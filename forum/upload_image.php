<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tranisitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload Image</title>
    <style type="text/css" title="text/css" media="all">
        .error {
            font-weight: bold;
            color: #c00;
        }
    </style>
</head>
<body>
<h2> Upload An Image </h2>

<?php 
# Upload An Image scripts.
if($_SERVER['REQUEST_METHOD'] == 'POST') {
// Check for an uploaded file: 
if(isset($_FILES['upload'])) {
// Validate image type:
$allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png' );

if(in_array($_FILES['upload']['type'], $allowed) ) {
// Move the file over:
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/{$_FILES['upload']['name']}") ) {
echo '<p> <em> The file has been uploaded! </em> </p>';

}// End of move_uploaded_file

} else { // Invalid type.
echo '<p> Please upload a jpeg or png image. </p>';
}


}// End of if(isset($_FILE['upload']))

// Check for an error:
if($_FILES['upload']['error'] > 0) {
echo '<p> The file could not be uploaded because: <strong> ';

// Print a message base upon the error.
switch($_FILES['upload']['error']) {
case 1:
print 'The file exceeds the upload_max_filesize setting in php.ini';
break;

case 2:
print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
break;

case 3: 
print 'The file was only partially uploaded.';
break;

case 4:
print 'No file was uploaded.';
break;

case 6:
print 'No temporary folder was available.';
break;

case 7:
print 'Unable to write to the disk';
break;

case 8:
print 'File upload stopped.';
break;

default:
print 'A system error ocurred.';
break;

}// End of SWITCH.
print '</strong> </p>'; 

} // End of error IF. 

// Delete the file if it still exists:
if(file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
unlink($_FILES['upload']['tmp_name']);

} 

} // End of the main submition if statement.

?>

         <form style="margin:10px;" action="upload_image.php" method="post" enctype="multipart/form-data"> 

          <input type="hidden" name="MAX_FILE_SIZE" value="524288" />

            <fieldset>
             <legend> Select a jpeg or png image of 512KB or smaller to be uploaded:
            <p style="margin:10px;"> <strong>File: </strong>  <input type="file" name="upload" /> </p>
            </legend>
           </fieldset>
           <p> <input type="submit" name="submit" value="Upload"  /> </p>

         </form> 