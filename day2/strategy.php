<?php

$app = new Application();

echo $app->run(new Config_Json('config.json'))
    ->getAppName();

echo $app->run(new Config_Php('config.php'))
    ->getAppName();

/*
class Application
{
    protected $config = [];
    protected $appName = 'App';

    public function run($filepath)
    {
        $file_type = $this->getConfigType($filepath);

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
    }

    public function getAppName()
    {

    }

    protected function getConfigType($filepath)
    {
        return pathinfo($filepath)['extension'];
    }
}
*/