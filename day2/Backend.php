<?php

function getDbData()
{
    return 'db data';
}

// Cache System
$key = 'cache';
$backend = new Backend_File();
if ($backend->has($key)) {
    return $backend->get($key);
}

$content = getDbData();
$backend->save($key, $content);
return $content;

abstract class Backend
{
    public function save($key, $value)
    {

    }

    public function get($key)
    {

    }

    public function has($key)
    {

    }
}

class Backend_File extends Backend
{
    public function save($key, $value)
    {
        file_put_contents($key, $value);
    }

    public function get($key)
    {
        return file_get_contents($key);
    }

    public function has($key)
    {
        return file_exists($key);
    }
}

class Backend_Memcached extends Backend
{
    protected $mmc;

    public function save($key, $value)
    {
        $this->mmc->add($key, $value);
    }

    public function get($key)
    {
        $this->mmc->get($key);
    }

    public function has($key)
    {
        return (FALSE !== $this->mmc->get($key));
    }
}

abstract class Frontend
{
    protected $backend = null;

    public function __construct(Backend $backend)
    {
        $this->backend = $backend;
    }
}

class Frontend_Page extends Frontend
{
    public function save($page)
    {
        $key = $this->getUrl();
        $this->backend->save($key, $page);
    }
}

class Frontend_Dataset extends Frontend
{
    public function save($dataset)
    {
        $data = serialize($dataset);
        $key = $dataset->id();
        $this->backend->save($key, $data);
    }
}
