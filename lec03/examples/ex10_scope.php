<?php

$x = 1;

function myPrint() {
    $x = 3;
    echo $x . "\n";
}


echo $x . "\n";
myPrint();
echo $x . "\n";

$y = 1;

function globalMyPrint() {
    GLOBAL $y;
    $y = 3;
    echo $y . "\n";
}

echo $y . "\n";
globalMyPrint();
echo $y . "\n";

$z = 0;
function staticMyPrint() {
    STATIC $z = 0;
    echo ++$z . "\n";
}

staticMyPrint();
staticMyPrint();
staticMyPrint();
echo $z . "\n";;