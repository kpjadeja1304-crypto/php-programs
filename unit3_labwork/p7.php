<?php

$counter = 0;

function incrementCounter() {
    
    $GLOBALS['counter']++;
}


incrementCounter();
incrementCounter();
incrementCounter();


echo "Counter value: " . $counter;
?>
