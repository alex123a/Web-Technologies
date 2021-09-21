<?php

function add1($var) {
  ++$var;
}

$x = 1;

echo $x . "\n"; 
add1($x);
echo $x . "\n"; 

function saveAdd1(&$var) {
  ++$var;
}

$x = 1;

echo $x . "\n"; 
saveAdd1($x);
echo $x . "\n"; 
