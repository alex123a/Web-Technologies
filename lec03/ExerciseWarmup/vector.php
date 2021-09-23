<?php
    class Vec {
        public $x;
        public $y;

        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }

        public function plus($a, $b) {
            return [$this->x + $a, $this->y + $b];
        }

        public function minus($a, $b) {
            return [$this->x - $a, $this->y - $b];
        }

        public function getLength() {
            return sqrt($this->x**2 + $this->y**2);
        }
    }

    $vector = new Vec(3, 2);
    $arrayPlus = $vector->plus(1, 2);
    $arrayMinus = $vector->minus(1, 2);
    echo $arrayPlus[0]." ".$arrayPlus[1]."\n";
    echo $arrayMinus[0]." ".$arrayMinus[1]."\n";
    echo $vector->getLength();
?>