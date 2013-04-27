<?php

abstract class Vehicle
{
    abstract public function forward();
}

class Car extends Vehicle
{
    public function forward()
    {
        echo '用四輪前進' . PHP_EOL;
    }
}

class Rickshaw extends Vehicle
{
    public function forward()
    {
        echo '人拉著前進' . PHP_EOL;
    }
}

class Motocycle extends Vehicle
{
    public function forward()
    {
        echo '用兩輪前進' . PHP_EOL;
    }
}

$vehicles = [
    new Car(),
    new Rickshaw(),
    new Motocycle(),
];

foreach ($vehicles as $v) {
    $v->forward();
}

