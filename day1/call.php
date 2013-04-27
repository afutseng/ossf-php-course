<?php

class Category
{
    public function __call($name, $args)
    {
        preg_match('/^fetch(\w+)by(\w+)$/i', $name, $matches);
        $args = [strtolower($matches[1]), strtolower($matches[2])];
        call_user_func_array([$this, 'fetch'], $args);
    }

    protected function fetch($type, $author)
    {
        var_dump($type, $author);
    }
}

$cate = new Category();
$cate->fetchArticlesByJaceju();