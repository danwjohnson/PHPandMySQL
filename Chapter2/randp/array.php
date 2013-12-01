<?php   # This script will do some work on an array.  From the Review and Pursue section.

$teams[] = 'Cubs';
$teams[] = 'Phillies';
$teams[] = 'Met';
$teams[] = 'Orioles';
$teams[] = 'Rays';

echo '<p>Teams listed below:</p><p>';

foreach ($teams as $values) {
    
    echo "{$values} ";
    echo "\n";
    
}
echo '</p>';

sort($teams);

foreach ($teams as $values) {
    
    echo "{$values} ";
    echo "\n";
    
}
echo '</p>';

rsort($teams);

foreach ($teams as $values) {
    
    echo "{$values} ";
    echo "\n";
    
}
echo '</p>';

?>