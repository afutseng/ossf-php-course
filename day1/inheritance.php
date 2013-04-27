<?php

class A
{
    public $name = 'A';

    public function __construct()
    {
        echo 'A is created.' . PHP_EOL;
    }

    public function test()
    {
        echo get_class($this) . PHP_EOL;
        echo $this->name . PHP_EOL;
    }
}

class B extends A
{
    public function __construct()
    {
        parent::__construct();
        echo 'B is created.' . PHP_EOL;
        echo $this->name . PHP_EOL;
    }

    public function test()
    {
        echo 'B->test()' . PHP_EOL;
    }
}

$b = new B();
$b->test();