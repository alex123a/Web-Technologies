<?php

$array1 = [1, "Hello"];
$array2 = [2, "Bye"];

var_dump(array_merge($array1,$array2));
array_push($array1,3);
var_dump($array1);
array_unshift($array1, "init");
var_dump($array1);
