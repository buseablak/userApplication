<?php

class Database
{
    private static $pdo;

    public static function connect()
    {
        if (self::$pdo === null) {
            $dsn = 'mysql:host=localhost;dbname=busetest;charset=utf8';
            $username = 'buse';
            $password = '123';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$pdo = new PDO($dsn, $username, $password, $options);
        }
        return self::$pdo;
    }

    public static function query($sql, $params = [])
    {
        $pdo = self::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
