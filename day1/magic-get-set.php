<?php

class Row
{
    private $data = [
        'name' => '',
        'reg_date' => '',
        'gender' => 'male'
    ];

    public function __get($key)
    {
        return isset($this->data[$key])
            ? $this->data[$key] : false;
    }

    public function __set($key, $value)
    {
        if (! isset($this->data[$key])) {
            throw new Exception("attribute '$key' not exists!");
        }

        $this->$key = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }
}

$r = new Row();
$r->name = 'afu';

echo $r->name . PHP_EOL;
echo $r->gender . PHP_EOL;

var_dump( isset($r->name)  );