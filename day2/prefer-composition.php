<?php

abstract class Db
{
    public function query()
    {

    }
}

class Db_Mysql extends Db
{
    public function query($sql)
    {
        return mysql_query($sql);
    }
}


class Db_Sqlite extends Db
{

}


class DbTable
{
    protected $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function info()
    {
        $this->db->query();
    }

    public function insert($data)
    {
        // insert $data
    }
}

$db = new Db_Sqlite();
$table = new DbTable($db);

class DbRow
{
    protected $dbTable;

    public function __construct(DbTable $dbTable)
    {
        $this->dbTable = $dbTable;
    }

    public function save()
    {

    }
}

class Person
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function changeName($name)
    {
        if ($name === $this->name) {
            throw new Exception('不可跟原來的名字相同');
        }

        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getArticlesByDateRange($start, $end)
    {

    }
}

$person = new Person('afu');
$articles = $person->getArticlesByDateRange('2012', '2013');