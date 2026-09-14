<?php

function getPdo(): PDO
{
    $host = 'mysql';
    $db = 'curriculum';
    $user = 'curriculum';
    $pass = 'curriculum';

    $dsn = "mysql:host={$host};dbname={$db};charset=utf8mb4";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
