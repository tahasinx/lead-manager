<?php


class Database
{

    private static $conn;
    private $connection;

    private function __construct()
    {

        $server   = getenv('DB_SERVER');
        $dbname   = getenv('DB_NAME');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $this->connection = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $username, $password);
    }

    public static function getConnection()
    {
        if (self::$conn == null) {
            self::$conn = new Database();
        }
        return self::$conn->connection;
    }
}
