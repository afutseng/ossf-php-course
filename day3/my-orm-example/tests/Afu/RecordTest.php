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
    public function setUp()
    {
        $dsn = 'sqlite:' . DB_PATH . '/my.db.sqlite';
        echo 'dsn = ' . $dsn . PHP_EOL;
        $dbh = new \PDO($dsn);
        $dbh->query('CREATE TABLE "users" ("id" INTEGER PRIMARY KEY NOT NULL UNIQUE, "name" VARCHAR, "birthday" VARCHAR)');

        $user = new User($dsn, $username, $password);
        $user->truncate();
    }

    public function tearDown()
    {
        $dsn = 'sqlite:' . DB_PATH . 'my.db.sqlite';
        $dbh = new \PDO($dsn);
        //$dbh->query('DROP TABLE "users"');
    }

    public function testIdShouldBeOneAfterSave()
    {
        $dsn = 'sqlite:' . DB_PATH . '/my.db.sqlite';

        $user = new User($dsn, $username, $password);
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
        $dsn = 'sqlite:' . DB_PATH . '/my.db.sqlite';

        $user = new User($dsn, $username, $password);
        $user->name = 'afu';
        $user->birthday = '1970-05-01';
        $user->save();

        $user = (new User($dsn, $username, $password))->find(1);
        $this->assertEquals('afu', $user->name);
    }

    /**
     * @depends testItShouldBeSameNameAfterFind
     */
    public function testItShouldBeOtherNameAfterSave()
    {
        $dsn = 'sqlite:' . DB_PATH . '/my.db.sqlite';

        $user = new User($dsn, $username, $password);
        $user->name = 'afu';
        $user->birthday = '1970-05-01';
        $user->save();

        $user = (new User($dsn, $username, $password))->find(1);
        $this->assertEquals('afu', $user->name);

        $user->name = 'afuuu';
        $user->save();
        $this->assertEquals('afuuu', $user->name);
    }

}
