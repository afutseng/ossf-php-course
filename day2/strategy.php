<?php

$app = new Application();

echo $app->run('config.json')
    ->getAppName();

echo $app->run('config.php')
    ->getAppName();


class Application
{
    protected $config = [];
    protected $appName = 'App';

    public function run($filepath)
    {
        $config = Config::factory($filepath);

    }



    public function getAppName()
    {

    }

    protected static function getConfigType($filepath)
    {
        return pathinfo($filepath)['extension'];
    }
}

abstract class Config
{
    protected $data = [];

    public static function factory($filepath)
    {
        $file_type = static::getConfigType($filepath);
        $class_name = __NAMESPACE__ . '\\Config_' . ucfirst(strtolower($file_type));
        return new $class_name($filepath);
    }
}

class Config_Json extends Config
{
    public function __construct($path)
    {
        $this->data = (array) json_decode(file_get_contents($path));
    }

}

class Config_Ini extends Config
{
    public function __construct($path)
    {
        $this->data = parse_ini_file($path);
    }
}

class Config_Php extends Config
{
    public function __construct($path)
    {
        $this->data = include($path);
    }
}