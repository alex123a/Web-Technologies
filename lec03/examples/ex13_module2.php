<?php

namespace Model;
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
