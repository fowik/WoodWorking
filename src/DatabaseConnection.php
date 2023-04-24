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
        $conn = mysqli_connect("localhost", "root", '', "woodworking");

        $user_table =
        "
            CREATE TABLE IF NOT EXISTS user (
                uID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                Password varchar(60) NOT NULL,
                Name varchar(30) NOT NULL,
                Surname varchar(30) NOT NULL,
                Username varchar(30) NOT NULL,
                Email varchar(40) NOT NULL,
                PhoneNumber varchar(15) NOT NULL,
                isAdmin boolean NOT NULL,
                PRIMARY KEY (uID)
            )  
        ";
        
        if ($conn->query($user_table) === TRUE) {
            // printf("Table user is successfully created.\n");
        }

        $producttype_table =
        "
            CREATE TABLE IF NOT EXISTS ProductType (
                catID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                type varchar(30) NOT NULL,
                PRIMARY KEY (catID)
            )
        ";

        if ($conn->query($producttype_table) === TRUE) {
            // printf("Table ProductType is successfully created.\n");
        }

        $product_table =
        "
            CREATE TABLE IF NOT EXISTS product (
                prodID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                Title varchar(30) NOT NULL,
                Description varchar(255) NOT NULL,
                Price decimal(10,2) NOT NULL,
                Image longblob NOT NULL,
                catID int(11) UNSIGNED NOT NULL,
                PRIMARY KEY (prodID),
                FOREIGN KEY (catID) REFERENCES ProductType(catID)
            )
        ";

        if ($conn->query($product_table) === TRUE) {
            // printf("Table product is successfully created.\n");
        }

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