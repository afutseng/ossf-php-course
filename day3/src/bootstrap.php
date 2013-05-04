<?php

defined('CLASSES_PATH') || define('CLASSES_PATH', __DIR__ . '/../src');

spl_autoload_register(function ($className)
{
    $className = str_replace('\\', '/', $className);
    $classPath = CLASSES_PATH . '/' . $className . '.php';
    if (file_exists($classPath)) {
        include $classPath;
        return true;
    }
    return false;
});
