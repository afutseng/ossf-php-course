<?php

class A
{
    private $data = [
        'id' => 1,
        'name' => 'afu'
    ];

    private $test;

    public function setTest($t)
    {
        $this->test = $t;
    }

    function __sleep()
    {
        return ['data'];
    }
    function __wakeup()
    {
        echo 'Waking up...';
    }
}

$a = new A();
$a->setTest('sxczczcxz');
var_dump($a);
file_put_contents('tmp.txt', serialize($a));

$tmp = file_get_contents('tmp.txt');
$b = unserialize($tmp);
var_dump($b);