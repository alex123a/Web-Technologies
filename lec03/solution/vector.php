<?php

class Vector {
  public $x; 
  public $y;

  public function __construct($x, $y) { 
    $this->x = $x;
    $this->y = $y; 
  }

  public function plus($anotherVector) {
    return new Vector($this->x + $anotherVector->x, $this->y + $anotherVector->y);
  }

  public function minus($anotherVector) {
    return new Vector($this->x - $anotherVector->x, $this->y - $anotherVector->y);
  }

  public function length() {
    return sqrt($this->x ** 2 + $this->y ** 2);
  }
}