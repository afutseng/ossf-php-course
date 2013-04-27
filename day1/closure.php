<?php

function test()
{
    $b = 123;
    return function ($a) use ($b) {
        return $a + $b;
    };
}

$func = test();
var_dump($func);

echo $func(1), PHP_EOL;