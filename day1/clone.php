<?php
class A
{

}

class B
{
    private $a = null;

    public function __construct()
    {
        $this->a = new A();
    }

    public function getA()
    {
        return $this->a;
    }

    public function __clone()
    {
        $this->a = clone $this->a;
    }
}

$b = new B();
$c = clone $b;

$a1 = $b->getA();
$a2 = $c->getA();

var_dump($a1 === $a2);