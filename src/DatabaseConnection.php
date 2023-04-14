<?php

namespace App;

class DatabaseConnection
{
    private $conn;
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'woodworking';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';

    public function __construct()
    {
        return $this->conn = new \PDO("mysql:host=". self::DB_HOST .";dbname=" . self::DB_NAME . "", self::DB_USER, self::DB_PASSWORD);
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->conn->prepare($sql);
    } 

    public function execute($sql): bool
    {
        return $this->conn->exec($sql);
    }
    
    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}