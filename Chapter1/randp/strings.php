<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tranisitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Strings Testing</title>
</head>
<body>
<?php   # Review and Pursue Script - Chapter 1 String

// This scripts performs several functions against a string.

$string = 'Test String';
echo '<p>';
echo $string;
echo "</p>\n\n";
echo '<p>' . str_shuffle($string) . ': Shuffled</p>';
echo '<p>' . strlen($string) . ': String Length</p>';
echo '<p>' . strtolower($string) . ': Lower Case</p>';
echo '<p>' . strtoupper($string) . ': Upper Case</p>';
echo '<p>' . wordwrap($string, 5, "<br />\n", true) . ': Word Wrap 5 Chars</p>';

?>

</body>

</html>

