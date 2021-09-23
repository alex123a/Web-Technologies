<?php

function printTriangle($deep, $symbol='*') {
    $toPrint = $symbol;
    for($i = 0; $i < $deep ; $i++) {
        echo $toPrint . "\n";
        $toPrint .= $symbol;
    }
}