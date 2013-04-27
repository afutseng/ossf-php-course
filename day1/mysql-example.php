<?php

require 'Mysql.php';

try {
    $db = new Mysql('localhost', 'username', 'password');
    $db->selectDb('test');
    $users = $db->query('SELECT * FROM `user`');
    if (! $users) {
        die('Invalid query: ' . $db->getError());
    }
} catch (Exception $e) {
    echo $e->getMessage();
}