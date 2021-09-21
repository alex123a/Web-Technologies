<?php

function testIf($val){
    if ($val < 20) {
      echo "Less than 20\n";
    }
    else {
        echo "More than 20\n";
    }
} 

testIf(5);
testIf(20);
testIf(21);

function testElseIf($val){
    if ($val < 20) {
      echo "Less than 20\n";
    }
    elseif ($val > 20) {
        echo "More than 20\n";
    }
    else {
        echo "Equal to 20\n";   
    }
}

testElseIf(5);
testElseIf(20);
testElseIf(21);

function binOp($val) {
    echo $val < 20 ? "Less than 20\n" : "More than 20\n";
}

binOp(5);
binOp(20);
binOp(21);

function nullCheck($val) {
    $p = $val ?? "Val is null";
    echo $p . "\n";
}

nullCheck(1);
nullCheck(null);

$array = [1 , 2 , 3];
foreach($array as $val){
    echo $val."\n";
}