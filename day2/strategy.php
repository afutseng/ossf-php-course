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

        switch ($file_type) {
            case 'ini':
                $config = new Config_Ini($filepath);
                break;
            case 'json':
                $config = new Config_Json($filepath);
                break;
            case 'php':
                $config = new Config_Php($filepath);
                break;
            default:
                break;
        }
        return $config;
    }
}