<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassAdd {
    public function addProd() {
        $conn = new DatabaseConnection();

        echo  $_POST['title']; die; 
        $conn->query("INSERT INTO `products` (`title`, `description`, `price`, `catID`) VALUES (?, ?, ?)", [
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $_POST['catID']
        ]);
    }

    public function addType() {
        $conn = new DatabaseConnection();

        $conn->query("INSERT INTO `producttype` (`type`) VALUES (?)", [
            $_POST['type']
        ]);
    }
}