<?php

$a = ["one" => 1, "two" => 2];
echo $a["one"];
echo "\n";

array_push($a, 3);

var_dump($a);

$a = ["one" => 1, "two" => 2];
$b = ["two" => "two", "three" => "three"];
var_dump(array_merge($a, $b));
var_dump($a + $b);

echo(array_key_exists("one",$a));