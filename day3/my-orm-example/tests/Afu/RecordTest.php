<?php

namespace Afu;

class User extends Record
{
    protected $_tableName = 'users';

    protected $_data = [
        'id'       => null,
        'name'     => null,
        'birthday' => null,
    ];
}

class RecordTest extends \PHPUnit_Framework_TestCase
{
    protected $db = null;

    public function setUp()
    {
        $dsn = 'sqlite:' . DB_PATH . '/my.db.sqlite';
        echo 'dsn = ' . $dsn . PHP_EOL;
        $this->db = new \PDO($dsn);
        $this->db->query('CREATE TABLE "users" ("id" INTEGER PRIMARY KEY NOT NULL UNIQUE, "name" VARCHAR, "birthday" VARCHAR)');

        $user = new User($this->db);
        $user->truncate();
    }

    public function tearDown()
    {
        $this->db->query('DROP TABLE "users"');
    }

    public function testIdShouldBeOneAfterSave()
    {
        $user = new User($this->db);
        $user->name = 'afu';
        $user->birthday = '1970-05-01';
        $user->save();
        $this->assertEquals(1, $user->id);
    }

    /**
     * @depends testIdShouldBeOneAfterSave
     */
    public function testItShouldBeSameNameAfterFind()
    {
        $user = new User($this->db);
        $user->name = 'afu';
        $user->birthday = '1970-05-01';
        $user->save();

        $user = (new User($this->db))->find(1);
        $this->assertEquals('afu', $user->name);
    }

    /**
     * @depends testItShouldBeSameNameAfterFind
     */
    public function testItShouldBeOtherNameAfterSave()
    {
        $user = new User($this->db);
        $user->name = 'afu';
        $user->birthday = '1970-05-01';
        $user->save();

        $user = (new User($this->db))->find(1);
        $this->assertEquals('afu', $user->name);

        $user->name = 'afuuu';
        $user->save();
        $this->assertEquals('afuuu', $user->name);
    }

}
