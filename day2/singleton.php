<?php


$app1 = Application::getInstance();
$app2 = Application::getInstance();
$app3 = Application::getInstance();
$app4 = Application::getInstance();

var_dump($app1 === $app2);

class Application
{
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        // 也要處理子類別的 instance
        if (is_null(static::$instance)
            || !(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}