<?php

namespace App;

class DatabaseConnection
{
    private $connection;
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'woodworking';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';

    public function __construct()
    {
        $this->connection = new \PDO("mysql:host=". self::DB_HOST .";dbname=" . self::DB_NAME . "", self::DB_USER, self::DB_PASSWORD);
    }

    public function prepare($sql): \PDOStatement 
    {
        return $this->connection->prepare($sql);
    } 

    public function execute($sql)
    {
        return $this->connection->exec($sql);
    }

}