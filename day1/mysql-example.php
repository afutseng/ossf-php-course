<?php

require 'Mysql.php';

$db = new Mysql('localhost', 'username', 'password');
$db->selectDb('test');
$users = $db->query('SELECT * FROM `user`');