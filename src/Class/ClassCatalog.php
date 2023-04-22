<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassCatalog {
    public function getProd() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM product INNER JOIN producttype ON product.catID = producttype.catID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $prod = $stmt->fetchALL();

        return $prod;
    }

    public function getTypes() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $type = $stmt->fetchALL();

        return $type;
    }
}