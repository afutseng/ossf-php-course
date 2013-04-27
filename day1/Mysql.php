<?php

class Mysql
{
    private $link = null;
    public function __construct($host, $user, $pw)
    {
        $this->link = mysql_connect($host, $user, $pw);
    }

    public function selectDb($db)
    {
        mysql_select_db($db, $this->link)
            or die('Can not use ' . $db . ' ' . mysql_error($this->link));
    }

    public function query($sql)
    {
        return mysql_query($sql)
            or die('Invalid query: ' . mysql_error($this->link));
    }

    public function close()
    {
        mysql_close($this->link);
    }

    public function __desctruct()
    {
        $this->close();
    }
}

