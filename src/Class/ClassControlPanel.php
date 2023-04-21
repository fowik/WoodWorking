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