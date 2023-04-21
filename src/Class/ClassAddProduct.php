<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassAddProduct {
    public function addProd() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();
            
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['catID'];

            $conn->query("INSERT INTO `product` (`title`, `description`, `price`, `catID`) VALUES ('$title','$description','$price','$category')");
        }
    }

    public function addType() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();

            $type = $_POST['type'];

            $conn->query("INSERT INTO `producttype` (`type`) VALUES ('$type')");
        }
    }

    public function getTypes() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype";
        $result = $conn->query($sql);
        
        return $result->fetchAll();
    }
}