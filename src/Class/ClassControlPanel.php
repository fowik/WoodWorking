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
        
        $row = $result->fetch(\PDO::FETCH_NUM);
        if ($row[0] === null) {
            return '0.00';
        } else {
            return $row[0];
        }
    }

    public function getTotalYear()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(TotalPrice) FROM orders WHERE Status = 'Checking' AND YEAR(OrderDate) = YEAR(NOW());";
        $result = $conn->query($sql);
        
        $row = $result->fetch(\PDO::FETCH_NUM);
        if ($row[0] === null) {
            return '0.00';
        } else {
            return $row[0];
        }
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

    public function searchUsers($searchTerm) {
        $conn = new DatabaseConnection();
        $pdo = $conn->getConnection();

        $stmt = $pdo->prepare("SELECT * FROM user WHERE Username LIKE :searchTerm OR Surname LIKE :searchTerm");
        $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

    public function searchProducts($searchTerm) {
        $obj = new DatabaseConnection();
        $conn = $obj->getConnection();

        $stmt = $conn->prepare("SELECT prodID, Title, Description, Price FROM product WHERE Title LIKE :searchTerm");
        $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
}