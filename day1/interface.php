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

interface Viewable
{
    public function lookLike();
}

interface Eatable
{
    public function tasteLike();
}

class Apple implements Viewable, Eatable
{
    public function lookLike()
    {

    }

    public function tasteLike()
    {

    }
}

class Human
{
    public function look()
    {

    }
    public function eat(Eatable $e)
    {

    }
    public function drive(Vehicle $v)
    {
        $v->forward();
    }
}




$jaceju = new Human();


$vehicles = [
    new Car(),
    new Rickshaw(),
    new Motocycle(),
];

foreach ($vehicles as $v) {
    $jaceju->drive($v);
}

