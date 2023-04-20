<?php 

namespace App\Class;

use App\Class\ClassDatabase;
use App\DatabaseConnection;

class ClassControlPanel {
    public function getUserCount() {
        $conn = new DatabaseConnection();

        $sql = "SELECT COUNT(*) FROM user";
        $result = $conn->query($sql);
        
        return $result->fetchColumn();
    }
}