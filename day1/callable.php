<?php

class A
{
    public function __invoke($a, $b)
    {
        if ($a === $b) {
            return 0;
        }
        return ($a > $b) ? -1 : 1;
    }
}

$a = new A();
var_dump(is_callable($a));

$numbers = [1, 3, 7, 5, 20, 89, 36, 2];
usort($numbers, $a);
print_r($numbers);