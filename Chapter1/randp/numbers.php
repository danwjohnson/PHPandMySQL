<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tranisitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Numbers Testing</title>
</head>
<body>
<?php   # Review and Pursue Script - Chapter 1 Numbers

// This scripts performs several functions against a number.

$num1 = 5;
$num2 = 7;

$total = $num1 + $num2;
$quotient = $num1/$num2;
$quotient_rounded = number_format($num1 / $num2, 2);
$product = $num1 * $num2;
$cosine = cos($num1);
$cosine_rounded = number_format(cos($num1), 3);

echo '<p>The sum of num1 and num2 is: ' . $total . '</p>';
echo '<p>The quotient of num1 and num2 is: ' . $quotient . '</p>';
echo '<p>The quotient of num1 and num2 rounded is: ' . $quotient_rounded . '</p>';
echo '<p>The product of num1 and num2 is: ' . $product . '</p>';
echo '<p>The cosine of num1 is: ' . $cosine . '</p>';
echo '<p>The cosine of num1 rounded is: ' . $cosine_rounded . '</p>';

?>

</body>

</html>