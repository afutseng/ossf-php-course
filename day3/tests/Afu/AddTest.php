<?php

class AddTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calculator = new Afu\Calculator();
        $result = $calculator->add(1, 2);
        $this->assertEquals(3, $result);
    }
}