<?php
require "ex13_module2.php";


$user = new Model\User("Miguel");
$user->email = "mail@mail.com";
$user->printUser();
echo "\n";

use Model\User as User;
$user = new User("Miguel");
$user->email = "mail@mail.com";
$user->printUser();