<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassAdd {
    public function addProd() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();
            
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['catID'];

            $sql = "SELECT * FROM `product` WHERE `Title` = '$title'";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0 && $title != "" && $title != null && $description != "" && $description != null && $price != "" && $price != null && $category != "" && $category != null) {
                $_SESSION['message'] = "Šāds produkts jau eksistē!";
            } else {
                $conn->query("INSERT INTO `product` (`Title`, `Description`, `Price`, `catID`) VALUES ('$title', '$description', '$price', '$category')");
            }
        } else {
            $_SESSION['message'] = 'Lūdzu aizpildiet visus laukus!';
        }
    }

    public function addType() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();

            $type = $_POST['type'];
            $sql = "SELECT * FROM producttype WHERE type = '$type'";
            $result = $conn->query($sql);
            
            if ($type != "" && $type != null && $result->rowCount() === 0){
                $conn->query("INSERT INTO `producttype` (`type`) VALUES ('$type')");
            } else {
                $_SESSION['message'] = "Šī kategorija jau eksistē!";
            }
        } else {
            $_SESSION['message'] = 'Lūdzu aizpildiet visus laukus!';
        }
    }

    public function getTypes() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype";
        $result = $conn->query($sql);
        
        return $result->fetchAll();
    }
}