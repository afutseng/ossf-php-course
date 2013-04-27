<?php

class A
{
    public $name = 'afu';

    public function __toString()
    {
        return $this->name;
    }
}

$a = new A();
echo $a, PHP_EOL;