<?php

function db(): PDO
{
    $dsn = 'mysql:dbname=auth;host=127.0.0.1';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}