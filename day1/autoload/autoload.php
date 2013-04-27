<?php

spl_autoload_register('loadClasses');

function loadClasses($className)
{
    echo $className, "\n";
    $className = str_replace('\\', '/', $className);
    var_dump($className);
    //set_include_path(get_include_path() . ':' . __DIR__);
    //echo get_include_path() . PHP_EOL;
    //spl_autoload_extensions('.php');
    //echo '#' . __DIR__ . '/AutoloadExample/' . '#' . PHP_EOL;
    //set_include_path(__DIR__ . '/AutoloadExample/');
    spl_autoload($className);
    //var_dump(spl_autoload_extensions());
}

$car = new AutoloadExample\Car();
$human = new AutoloadExample\Human();
// $animal = new AutoloadExample\Animal();
var_dump($car, $human);