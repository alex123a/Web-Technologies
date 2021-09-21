<?php

class User {
  public $name; 
  public $email;

  public function __construct($name) { 
  	$this->name = $name; 
  }

  public function printUser() {
    echo "$this->name: $this->email"; 
  }
}


$user = new User("Miguel");
$user->email = "mail@mail.com";
$user->printUser();