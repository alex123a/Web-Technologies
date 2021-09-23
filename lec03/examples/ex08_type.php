<?php

function sum($a, $b) {
  return $a + $b;
}


var_dump(sum(5, "5 days"));

function sumType(int $a, int $b) {
  return $a + $b;
}



var_dump(sumType(5, "5"));
var_dump(sumType(5, "5 days"));