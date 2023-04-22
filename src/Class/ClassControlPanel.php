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

        $sql = "SELECT COUNT(*) FROM `orders`";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getProdSellQuant()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(`Quantity`) FROM `orders`";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }

    public function getProdSellSum()
    {
        $conn = new DatabaseConnection();

        $sql = "SELECT SUM(`Price`) FROM `product`";
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