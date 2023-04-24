<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassCatalog {
    public function getProd() {
        $conn = new DatabaseConnection();

        $prodID = $_GET['prodID'];

        $sql = "SELECT * FROM product INNER JOIN producttype ON product.catID = producttype.catID WHERE product.prodID = $prodID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $prod = $stmt->fetch();

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

    public function getProdWType() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype INNER JOIN product ON producttype.catID = product.catID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $type = $stmt->fetchALL();

        return $type;
    }
}