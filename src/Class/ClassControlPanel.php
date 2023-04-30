<?php 

namespace App\Class;

use App\DatabaseConnection;

class ClassControlPanel {
    public function getUserCount() 
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT COUNT(*) FROM user";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getOrderCount()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT COUNT(*) FROM `orders` WHERE Status = 'Checking'";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getProdCount()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(Quantity) AS TotalQuantity FROM orderitems WHERE orderID IN (SELECT orderID FROM orders WHERE Status = 'Checking')";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getTotalMonth()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(TotalPrice) FROM orders WHERE Status = 'Checking' AND MONTH(OrderDate) = MONTH(NOW()) AND YEAR(OrderDate) = YEAR(NOW());";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getTotalYear()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(TotalPrice) FROM orders WHERE Status = 'Checking' AND YEAR(OrderDate) = YEAR(NOW());";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getUsers() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        
        return $result->fetchALL();
    }

    public function getProd() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        
        return $result->fetchAll();
    }
}