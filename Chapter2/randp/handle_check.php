<?php

echo '<h3>You selected the following teams</h3>';

$selections = $_POST['teams'];


foreach ($selections as $s) {
    
    echo "<li>$s</li>\n";
    
}

sort($selections);

echo "<h3>Your selections sorted</h3>";

foreach ($selections as $ss) {
    
    echo "<li>$ss</li>\n";
    
}

echo '<h4>The total number of teams selected is: ' .count($selections) .'.';

?>
